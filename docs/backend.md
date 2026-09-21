# Backend Specification

## Runtime

Gunakan PHP 8.2+ dengan `declare(strict_types=1);`. Web layer harus tipis. Business rules ditempatkan di service class. Repository layer menangani query melalui PDO prepared statements. Environment configuration dibaca sekali dan tidak dikirim ke template.

## Modul

`CatalogService` mengembalikan Product DTO yang sudah difilter berdasarkan status publik. `OrderService` membuat order dan price snapshot dalam transaction. `PaymentService` memverifikasi signed event dan menyimpan idempotency key. `FulfillmentService` hanya menerima order `paid` dan SKU `eligible`. `AuditService` menyimpan actor, action, entity, request id, dan metadata yang sudah disensor.

## HTTP contract

Semua endpoint mengembalikan status yang tepat. Input invalid menghasilkan 422. Unauthenticated menghasilkan 401. Forbidden menghasilkan 403. Resource yang tidak ditemukan menghasilkan 404. Error internal tidak boleh mengembalikan stack trace ke customer.

## Security baseline

Output HTML menggunakan `htmlspecialchars`. Query database memakai prepared statement. Password memakai `password_hash` dengan Argon2id bila tersedia. Session memakai cookie `Secure`, `HttpOnly`, dan `SameSite=Lax`. Form state-changing memakai CSRF token. Admin login memakai rate limit, generic error message, dan optional MFA pada tahap berikutnya. Semua perubahan status order dicatat pada audit log.

## Webhook rules

Provider webhook diverifikasi memakai raw request body dan secret yang hanya ada di environment. Tanda tangan wajib diverifikasi sebelum parsing business event. Timestamp di luar tolerance ditolak. Event ID menjadi unique key. Handler harus idempotent dan aman terhadap event datang tidak berurutan.

## Error handling

Log harus memiliki correlation ID, route, actor type, dan error class tanpa token, password, credential, full payload, atau PII yang tidak diperlukan. User menerima pesan yang dapat ditindaklanjuti dan tidak membuka detail internal.

## Testing

Minimal: unit test untuk pricing dan state machine; integration test untuk transaction; security test untuk CSRF, RBAC, injection, XSS; webhook test untuk invalid signature, duplicate event, replay, dan retry.
