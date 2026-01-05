**Tabel `users`**
| Nama Field | Tipe Data | Panjang | Format / Keterangan |
| --- | --- | --- | --- |
| id | bigint (auto inc) | 20 | Primary key |
| name | varchar | 255 | |
| email | varchar | 255 | Unique, format email |
| email_verified_at | timestamp | | Nullable, `YYYY-MM-DD HH:MM:SS` |
| password | varchar | 255 | |
| role | enum | | `pengguna`, `super admin`, `admin`, `keuangan` |
| phone | varchar | 255 | Nullable, Unique |
| national_id | varchar | 255 | Nullable, Unique (NIK) |
| image_path | varchar | 255 | Nullable (path) |
| remember_token | varchar | 100 | Nullable |
| created_at | timestamp | | `YYYY-MM-DD HH:MM:SS` |
| updated_at | timestamp | | `YYYY-MM-DD HH:MM:SS` |

**Tabel `villages`**
| Nama Field | Tipe Data | Panjang | Format / Keterangan |
| --- | --- | --- | --- |
| id | bigint (auto inc) | 20 | Primary key |
| name | varchar | 255 | |
| address | text | ≤ 65,535 | |
| email | varchar | 255 | Nullable |
| phone | varchar | 255 | Nullable |
| description | text | ≤ 65,535 | Default: “Hello World!” |
| image_path | varchar | 255 | |
| banner_path | varchar | 255 | |
| created_at | timestamp | | `YYYY-MM-DD HH:MM:SS` |
| updated_at | timestamp | | `YYYY-MM-DD HH:MM:SS` |

**Tabel `administration_requests`**
| Nama Field | Tipe Data | Panjang | Format / Keterangan |
| --- | --- | --- | --- |
| id | bigint (auto inc) | 20 | Primary key |
| name | varchar | 255 | Nullable |
| phone | varchar | 255 | Nullable |
| nik | varchar | 255 | Nullable |
| letter_type | enum | | `ktp`, `kk`, `sk` |
| message | varchar | 255 | |
| response | varchar | 255 | Nullable |
| status | enum | | `approved`, `rejected`, `pending` (default) |
| user_id | bigint (FK) | 20 | ke `users.id` |
| admin_id | bigint (FK) | 20 | Nullable, ke `users.id` |
| created_at | timestamp | | `YYYY-MM-DD HH:MM:SS` |
| updated_at | timestamp | | `YYYY-MM-DD HH:MM:SS` |

**Tabel `citizen_reports`**
| Nama Field | Tipe Data | Panjang | Format / Keterangan |
| --- | --- | --- | --- |
| id | bigint (auto inc) | 20 | Primary key |
| name | varchar | 255 | Nullable |
| phone | varchar | 255 | Nullable |
| message | varchar | 255 | |
| attachment_paths | varchar | 255 | Path atau list path (string) |
| response | varchar | 255 | Nullable |
| status | enum | | `approved`, `rejected`, `pending` (default) |
| user_id | bigint (FK) | 20 | ke `users.id` |
| admin_id | bigint (FK) | 20 | Nullable, ke `users.id` |
| created_at | timestamp | | `YYYY-MM-DD HH:MM:SS` |
| updated_at | timestamp | | `YYYY-MM-DD HH:MM:SS` |

**Tabel `village_potentials`**
| Nama Field | Tipe Data | Panjang | Format / Keterangan |
| --- | --- | --- | --- |
| id | bigint (auto inc) | 20 | Primary key |
| name | varchar | 255 | |
| address | text | ≤ 65,535 | |
| email | varchar | 255 | Nullable |
| phone | varchar | 255 | Nullable |
| description | text | ≤ 65,535 | |
| is_draft | boolean | 1 | Default: true |
| author_id | bigint (FK) | 20 | ke `users.id` |
| created_at | timestamp | | `YYYY-MM-DD HH:MM:SS` |
| updated_at | timestamp | | `YYYY-MM-DD HH:MM:SS` |

**Tabel `village_funds`**
| Nama Field | Tipe Data | Panjang | Format / Keterangan |
| --- | --- | --- | --- |
| id | bigint (auto inc) | 20 | Primary key |
| title | varchar | 255 | |
| description | text | ≤ 65,535 | |
| amount | decimal | 10,2 | Nominal uang |
| transaction_type | enum | | `in`, `out` |
| is_draft | boolean | 1 | Default: true |
| admin_id | bigint (FK) | 20 | ke `users.id` |
| created_at | timestamp | | `YYYY-MM-DD HH:MM:SS` |
| updated_at | timestamp | | `YYYY-MM-DD HH:MM:SS` |

**Tabel `health_information`**
| Nama Field | Tipe Data | Panjang | Format / Keterangan |
| --- | --- | --- | --- |
| id | bigint (auto inc) | 20 | Primary key |
| title | varchar | 255 | |
| description | text | ≤ 65,535 | |
| event_date | date | | `YYYY-MM-DD` |
| location | varchar | 255 | |
| is_draft | boolean | 1 | Default: true |
| author_id | bigint (FK) | 20 | ke `users.id` |
| created_at | timestamp | | `YYYY-MM-DD HH:MM:SS` |
| updated_at | timestamp | | `YYYY-MM-DD HH:MM:SS` |
