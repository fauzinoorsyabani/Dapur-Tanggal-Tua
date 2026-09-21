# Data Model

## Entitas inti

| Entitas | Field penting | Catatan |
|---|---|---|
| `users` | id, email, password_hash, role, created_at | PII minimum; role bukan dari client |
| `products` | id, name, category, description, status | Status: draft, published, archived |
| `skus` | id, product_id, duration, price, currency, compliance_status | Snapshot source dan terms wajib tersedia |
| `orders` | id, public_id, user_id, status, total, currency, terms_version | Simpan price snapshot |
| `payments` | id, order_id, provider, provider_event_id, status, verified_at | provider_event_id unique |
| `fulfillments` | id, order_id, status, delivered_at, expires_at | Jangan simpan credential plaintext |
| `audit_logs` | id, actor_id, action, entity_type, entity_id, metadata, created_at | Append-only |

## Order state machine

```text
inquiry -> awaiting_payment -> paid -> fulfilling -> fulfilled
                             \-> payment_failed
inquiry / awaiting_payment -> cancelled
paid / fulfilled -> refund_requested -> refunded
```

Transisi hanya boleh dilakukan oleh service yang berwenang. `fulfilled` tidak dapat kembali ke `inquiry`. Refund tidak menghapus order atau payment record.

## Data retention

Simpan PII hanya selama dibutuhkan untuk support, tax, dispute, atau kewajiban hukum. Sediakan mekanisme redaction untuk data customer dan jangan menghapus audit event yang diwajibkan untuk keamanan.
