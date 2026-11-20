#!/usr/bin/env bash
# Smoke test KostKita setelah deploy.
# Pakai:  ./scripts/smoke-test.sh [BASE_URL]      (default http://127.0.0.1:8090)
# Exit code 0 = semua lolos, 1 = ada yang gagal. Aman dijalankan berulang (read-only).
# Catatan: kalau situs dipasang di belakang basic-auth, uji BASE_URL = http://127.0.0.1:8090 (langsung ke container).
set -u
BASE="${1:-http://127.0.0.1:8090}"
cd "$(dirname "$0")/.."
fail=0
ok()   { printf '  \033[32mPASS\033[0m  %s\n' "$1"; }
bad()  { printf '  \033[31mFAIL\033[0m  %s\n' "$1"; fail=1; }

echo "== Container"
for c in kostkita-db kostkita-web; do
  st=$(docker inspect -f '{{.State.Status}}' "$c" 2>/dev/null || echo missing)
  [ "$st" = "running" ] && ok "$c running" || bad "$c status=$st"
done
h=$(docker inspect -f '{{.State.Health.Status}}' kostkita-db 2>/dev/null || echo none)
[ "$h" = "healthy" ] && ok "kostkita-db healthy" || bad "kostkita-db health=$h"

echo "== Database"
n=$(docker compose exec -T db sh -c 'mysql -N -uroot -p"$MYSQL_ROOT_PASSWORD" koskita3 -e "SELECT COUNT(*) FROM kost" 2>/dev/null' 2>/dev/null | tr -d '\r')
[[ "$n" =~ ^[0-9]+$ ]] && [ "$n" -ge 1 ] && ok "tabel kost terbaca ($n baris)" || bad "tabel kost tidak terbaca (hasil: '$n')"

echo "== Halaman publik ($BASE)"
for p in "/" "/catalog/index.php" "/kost/index.php?id_kost=1" "/about/index.php" "/login/index.php" "/registration/index.php"; do
  code=$(curl -s -o /dev/null -m 10 -w '%{http_code}' "$BASE$p")
  [ "$code" = "200" ] && ok "GET $p -> 200" || bad "GET $p -> $code"
done

echo "== Konten dari database tampil di katalog"
curl -s -m 10 "$BASE/catalog/index.php" | grep -q "Kost Putra" && ok "katalog memuat nama kost dari DB" || bad "katalog kosong / DB tidak terhubung"

echo "== Login"
loc=$(curl -s -m 10 -o /dev/null -D - -d "username=__tidak_ada__&password=x" "$BASE/login/cek_login.php" | tr -d '\r' | awk -F': ' 'tolower($1)=="location"{print $2}')
[[ "$loc" == *"pesan=gagal"* ]] && ok "kredensial salah ditolak" || bad "login salah tidak ditolak (location='$loc')"

echo
[ $fail -eq 0 ] && echo "SEMUA LOLOS ✅" || echo "ADA YANG GAGAL ❌ — lihat: docker compose logs --tail 50"
exit $fail
