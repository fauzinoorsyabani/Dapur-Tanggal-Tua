# Threat Model & Security Checklist

## Assets

Aset utama adalah akun admin, data customer, status pembayaran, inventory entitlement, payment secret, dan audit log. Dampak tertinggi terjadi bila secret produk atau payment credential bocor.

## Threats and controls

| Threat | Control | Verification |
|---|---|---|
| XSS pada product copy | Escape output; sanitize rich text bila nanti ditambahkan | Malicious payload test |
| SQL injection | PDO prepared statements; least privilege DB user | Injection test |
| CSRF pada admin/order | Per-session token dan SameSite cookie | Missing/invalid token test |
| Credential stuffing | Rate limit, lockout bertahap, MFA roadmap | Auth abuse test |
| Webhook replay | Signature, timestamp, unique event ID | Replay test |
| IDOR pada order | Authorize by user ownership and role | Cross-user test |
| Secret leakage | Environment secrets, redacted logs, no public storage | Secret scan |
| Supply-chain issue | Pin dependencies, review updates | Dependency audit |
| Mis-selling | Compliance status gate, terms snapshot | Publishing test |

## Release gate

Sebelum production, pastikan HTTPS aktif, debug mode mati, error page generik, database backup terenkripsi, admin route tidak terindeks, CSP dan security headers aktif, dependency audit bersih, dan restore drill berhasil.

## Incident response

Saat insiden, operator menonaktifkan SKU atau payment adapter melalui feature flag, mempertahankan audit log, merotasi secret yang terdampak, dan membuka incident record. Jangan menghapus bukti atau mengirim klaim yang belum diverifikasi kepada customer.
