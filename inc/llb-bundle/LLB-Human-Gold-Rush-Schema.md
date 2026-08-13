# Human Gold Rush — Data Schema

For Codepixelzmedia (WordPress build) and Cursor (AI-assisted implementation). Describes every custom post type, taxonomy, field, and relationship implied by the 13-page prototype, matched to the copy already shipped in `LLB_Codepixelzmedia_Bundle/`.

## 0. Non-negotiable boundary (read first)

This schema supports two deliberately different tools:

1. **YAM-is-ON / Banking:** a qualified MEGAvoter merchant, vendor, or seller places a YAM-is-ON hang tag or sticker on an item or service offered for `$30` through the YAM JAM payment rail. The seller collects the revenue and acts as the Voluntary Fulfillment Network (VFN) for the vouchers they issue.
2. **Seeking Gratitude / Thanking:** an item, service, sponsorship, or act is distributed without accepting money. The complete `$30` pattern is recorded only as XP Experience Presence and can never become payment, stored value, remuneration, or a financial claim.

The XP append-only General Ledger never receives, holds, pools, or transmits the seller's money. It records:

- two-device proof of delivery and acceptance;
- the seller/VFN's month-end testament of fiat activity;
- `issued`, `pending`, `matured`, `disputed`, and `extinguished` obligation states;
- quarterly settlement evidence and extinguishment;
- Seeking Gratitude XP Presence events for behavioral comparison.

The `$0` WooCommerce backorder is an RSVP/inventory reservation record. It is not the `$30` YAM-is-ON sale, does not charge the participant, and carries no interest, APR, or fee.

### Canonical `$30` YAM-is-ON allocation

| Component | Amount | Meaning |
|---|---:|---|
| Cost of goods/services | `$10.00` | seller-reported COGS |
| Seller margin | `$9.70` | seller margin after the community commitment |
| Buyer rebate | `$5.00` | due through quarterly settlement |
| Social impact | `$4.00` | seller-designated community purpose |
| Patronage | `$1.00` | individual, 5-seller group, or guild allocation |
| Proof of delivery | `$0.30` | PoD service allocation |
| **Total** | **`$30.00`** | |

The four community lines total `$10.30`. The complete economic identity uses **research dotted equality** (`≐`) — comparison only, never convertible redemption (see `RESEARCH-EQUALITY.md`):

`$10 COGS + $9.70 seller margin + $10.30 community value ≐ $30`.

Seeking Gratitude mirrors the `$30` allocation pattern in XP only. Its fields must never join to a payout, payment, rebate, or settlement instruction.

**Anchoring update (per Codepixelzmedia's Implementation Journey, July 27, 2026):** the "append-only ledger" referenced throughout this document is no longer a placeholder — it's concretely Hedera Consensus Service (HCS). Only a hash and minimal linking metadata ever reach HCS; raw scan payloads, device mapping, and behavioral data stay in Postgres (hot) or IPFS (cold, batched, referenced by CID). See §3 for the updated `qr_scan_event` fields and §7 for the throttle/witness logic this implies.

---

## 0b. Seller as VFN; money outside the XP ledger

The MEGAvoter seller is the VFN for the YAM-is-ON vouchers that seller publishes. The seller:

- controls and manages their own inventory;
- collects the `$30` buyer payment using the YAM JAM rail or the seller's approved payment method;
- accepts responsibility for the `$10.30` community allocation;
- sends/posts a month-end VFN testament directly to the XP General Ledger;
- participates in quarterly reconciliation and settlement.

There is no separate VFN recipient that creates or verifies the seller's statement. The statement is a seller attestation. The General Ledger may correlate it with QR evidence and append a variance, buyer response, dispute, or correction, but never silently changes the original testament.

Do not describe the XP ledger as custodian. Do not store full card data, bank credentials, wallet private keys, or withdrawable fiat/crypto balances. Store only opaque external references and seller attestations needed for reconciliation.

Legal, tax, payment-processing, rebate, and money-services classifications remain fact-dependent and require qualified review before live deployment. `VFN` is the protocol role defined here; do not automatically represent every MEGAvoter as a legally registered Money Services Business.

---

## 0a. Landing page decision flow (build this first)

This is the one flow every other entity in this document exists to support. If Codepixelzmedia builds nothing else first, build this — it's the whole front door.

```
Postcard scanned
      │
      ▼
Register/resolve device and present consent
      │
      ▼
Present response: Participate / Observe / Walk Away
      │
      ├─ Observe ──▶ YAM'er membership pledge
      │                └─ REQUIRED Peace Pentagon branch
      │
      ├─ Participate ──▶ $12 annual MEGAvoter pledge
      │                    └─ branch optional at onboarding
      │
      └─ Walk Away ──▶ record consented response and exit
      │
      ▼
Select an eligible touchstone and/or Organized Krill Kit
      │
      ▼
Create $0 backorder / waitlist request
      │
      ├─ unavailable ──▶ remain waitlisted; no event admission
      │
      └─ available ──▶ reserve inventory and select pickup event
                              │
                              ▼
                       issue LAUGH RSVP
                              │
                              ▼
                  two-device delivery response
```

Rules this flow enforces (already reflected in `human-gold-rush.html`):
- The **Observe** path cannot complete without a `peace_pentagon_branch` value. There is no default/skip option for YAM'ers — this is a hard requirement, not a suggestion.
- **Participate** records the `$12` annual MEGAvoter pledge before MEGAvoter-only inventory is selectable.
- **Walk Away** requires nothing further and must never be presented as a lesser or incomplete outcome.
- The branch selected for an Observer determines which Discord Gracebook channel/section they land in — implement this as a query param or route (`/gracebook?branch=media`, etc.), not a generic homepage drop.
- A LAUGH event RSVP is a fulfillment credential. It is issued only after eligible inventory is reserved for that person.
- An unfulfilled or unconfirmed reservation returns without distribution credit, allocation, referral recognition, or leaderboard fulfillment.

---

## 1. Custom Post Types (CPTs)

### `laugh_event`
| Field | Type | Notes |
|---|---|---|
| host | text | church / merchant / community center / neighbor |
| date | datetime | |
| venue | text | |
| accessibility_notes | textarea | |
| purpose | textarea | |
| response_choices | taxonomy ref | `participate` \| `observe` \| `walk_away` |
| consent_note | textarea | required, shown pre-RSVP |
| quarter | taxonomy ref | → `quarter` (12-week window) |
| is_redemption_day | boolean | true only for Sept 1 annual events |
| rsvp_qr_id | text | maps to a `qr_code` record, type = identity |
| waitlist_status | select | `open` \| `full` \| `closed` |
| sponsorships | relationship | → `sponsorship` (many) |

### `sponsorship`
| Field | Type | Notes |
|---|---|---|
| sponsor_name | text | merchant/vendor |
| visibility | select | `public` \| `private` |
| donation_type | select | `product` \| `service` |
| donation_description | textarea | |
| linked_to | relationship | → `laugh_event` or `krill_kit_batch` |
| fulfillment_status | select | `pending` \| `packaged` \| `delivered` |
| packaged_by | relationship | → `participant` (must have role = MEGAvoter) |
| surplus_flag | boolean | must always be `false` — standing backorders settle only via matched donations; surplus inventory is rejected at intake |

### `krill_kit_batch`
The Organized Krill kit (hat, shirt, 10-pack of hang tags/stickers), referenced from `sponsorship.linked_to` above.

| Field | Type | Notes |
|---|---|---|
| kit_components | repeater | `hat` \| `shirt` \| `hang_tag_10pack` |
| origin_country | text | e.g. `Vietnam` for the hats — the country where the material/labor actually originates |
| origin_currency_reference | text | e.g. `VND, ~21,000:1 USD` — a symbolic reference exchange rate, shown to acknowledge the value of labor/material in its country of origin rather than pricing it only in USD. **Not a conversion rate used anywhere in this system** — see redemption_status below |
| pledge_value | decimal | $60, bookkeeping only, see §0 — never a charge |
| redemption_status | select | fixed value `not_possible_pre_genesis` — no fiat or crypto redemption, at the origin_currency_reference ratio or any other, exists anywhere in this schema before 2030-05-17 (mainnet genesis, §4). This field exists to make that fact explicit and auditable, not to imply a rate takes effect afterward |
| batch_quantity | integer | |

### `resource`
| Field | Type | Notes |
|---|---|---|
| media_type | taxonomy ref | `video` \| `podcast` \| `guide` \| `download` |
| related_lesson | relationship | → page/lesson it supports |
| runtime_or_length | text | |
| transcript_url | url | required for video/podcast before publish |
| discussion_guide_url | url | |
| facilitator_notes_url | url | |
| accessibility_tags | taxonomy ref | captions / audio description / etc. |

### `stone_inventory`
Thirteen distinct records, not twelve — the wholesale batch and the MEGAvoter-exclusive stone are sourced, engraved, and gated differently even though two of them share the same gemstone material.

| Field | Type | Notes |
|---|---|---|
| stone_word | select | `courage` (Tiger’s Eye) \| `kindness` (Obsidian) \| `wisdom` (Howlite) \| `lucky` (Unakite) \| `belief` (Crazy Agate) \| `gratitude` (Red Jasper) \| `health` (Aventurine) \| `happiness` (White Crystal) \| `dream` (Yellow Jade) \| `believe` (Sodalite) \| `wealth` (India Agate) \| `healing` (Opal) — 12 wholesale varieties, open to any `yamer` \| `faith_covenant` (Tiger's Eye, engraved **FAITH**, not Courage) — the 13th, MEGAvoter-exclusive record, gated to `participant.pledge_tier = megavoter_12` |
| source_type | select | `wholesale_everful` (applies to all 12 `stone_word` varieties above, including `courage`) \| `lapidary_cei` (applies only to `faith_covenant`) |
| lapidary_source | text | only populated for `faith_covenant` — cut at CEI. The 12 wholesale varieties have no lapidary_source; they ship in from Everful |
| unit_count | integer | current lot: 10 units per wholesale variety, 120 total; `faith_covenant` tracked separately, produced to local capacity |
| backorder_status | select | `standing` \| `matched_to_donation` \| `fulfilled` |
| pledge_value | decimal | bookkeeping only, see §0 |
| pickup_location | relationship | → `laugh_event` or `fulfillment_center` |
| pickup_window | daterange | |
| pickup_verification | select | `postcard_uuid_scan` — pickup status checked by scanning the participant's postcard for its registered UUID |

### `stone_order`
Bulk home-delivery request, distinct from a single personal pickup. Gated: `participant.registration_status` must be `registered`, and `participant.role` must be `megavoter` or `yamer` (not `walk_away` or `unreached`).

| Field | Type | Notes |
|---|---|---|
| requested_by | relationship | → `participant` (registered device only) |
| line_items | repeater | one row per `stone_inventory.stone_word`, each with a `quantity` (integer, ≥0) |
| delivery_address | address | ships to the registered device's home, not the fulfillment center |
| purpose | select | fixed value `distribution_at_laugh_event` — not resale, not personal stock |
| linked_laugh_event | relationship | → `laugh_event` the stones are meant to be distributed at |
| fulfillment_status | select | `requested` \| `packaged` \| `shipped` \| `distributed` |
| pledge_value | decimal | bookkeeping only, see §0 — never a charge |

### `fulfillment_center`
| Field | Type | Notes |
|---|---|---|
| center_type | select | `cei_pilot` (single site today) \| `cei_licensed` (post 2027-08-11, up to 100) |
| location | text | |
| active | boolean | |

### `participant`
(Not a public CPT — private, consent-gated. Maps loosely to a WP user with extended meta, or a separate table joined by pseudonymous `device_id`.)

`device_id` (a UUID) is the primary key for every behavioral record in this schema — `role`, responses, and XP all join back to it. It is never a name, email, or financial identifier; it exists purely so a research event can be reliably re-associated with the same anonymous person across a 12-week window.

| Field | Type | Notes |
|---|---|---|
| device_id | uuid | **primary key.** pseudonymous, not PII |
| registration_status | select | `registered` \| `unregistered` |
| role | taxonomy ref | `megavoter` \| `yamer` \| `walk_away` \| `unreached` — all four are research categories, quantified the same way, none is an identity |
| peace_pentagon_branch | taxonomy ref | `planning` \| `budget` \| `media` \| `distribution` \| `membership` |
| chosen_stone_word | relationship, nullable, **single-select** | → one of the 12 wholesale `stone_inventory.stone_word` values, picked at RSVP ("Join the Rush"); or `not_yet` — a first-class, equally valid choice for someone unwilling to accept a FAITH stone right now. Nothing expires and nothing triggers a follow-up; the participant can return and choose a word whenever it feels right. This is not a multi-stone collection: a participant carries at most one wholesale Practice FAITH word (as `yamer`) plus the separate `faith_covenant` record (lapidary-cut, engraved FAITH, not Courage) if/when `pledge_tier` becomes `megavoter_12` — never all twelve wholesale words, and there is no repeat-pickup flow for additional ones. |
| postcard_uuid | uuid | printed/encoded on the participant's postcard; scanned at the LAUGH event to check pickup status |
| pledge_tier | select | `yamer_free` \| `megavoter_12` \| none |
| pledge_accepted_at | timestamp, nullable | set the moment the participant scans and accepts their testnet position as a Human Gold Rush behavioral study participant — the same consent-scan event described in §0a. This is what "accepted" means for pledge sequencing; it is not a payment or collection event |
| pledge_intent_only | boolean | `true` for membership/backorder onboarding; a completed YAM-is-ON sale is stored separately in `yam_transaction` |
| sustainability_dues | decimal, nullable | the one field on this CPT that can represent real money — see §0b. Requires its own payment processor integration and its own compliance review; deliberately not detailed further in this document |
| reputation_score | select | `pending` \| `recorded` — advances only on (show_up AND gratitude_received) |
| xp_total | integer, **derived** | Experience Presence — computed by replaying `qr_scan_event.xp_delta` rows, never stored/mutated directly (see §6) |
| nwp_group | relationship | rolls XP up to a group/guild for network-weighted presence |
| discord_gracebook_linked | boolean | |
| consent_version | text | |
| network_environment | select | `mainnet` \| `testnet_control_group` — post-genesis (2030), 1% of participants remain flagged `testnet_control_group` for the following 10 years by design, not by error |

---

## 1b. Private operational tables

These are custom plugin tables, not public WordPress posts.

### `fulfillment_request`

| Field | Type | Notes |
|---|---|---|
| request_id | uuid | primary key |
| participant_id | uuid | → `participant.device_id` |
| membership_pledge_id | uuid | eligibility evidence |
| item_type | select | `practice_faith_stone` \| `tigers_eye_faith` \| `organized_krill_kit` |
| backorder_value | decimal | always `0.00`; reservation, not a sale |
| request_status | select | `requested` \| `waitlisted` \| `offered` \| `reserved` \| `rsvp_issued` \| `fulfilled` \| `deferred` \| `declined` \| `no_show` \| `withdrawn` \| `released_to_inventory` |
| requested_at | datetime | waitlist ordering |
| inventory_unit_id | uuid, nullable | assigned only when available |
| laugh_event_id | relationship, nullable | required before RSVP issuance |
| expires_at | datetime, nullable | reservation hold |

### `issuance_lot`

Every issuing identity has an independent current lot. A group lot is pooled only when the 5-seller group is itself the issuer; group membership never merges personal lots.

| Field | Type | Notes |
|---|---|---|
| issuance_lot_id | uuid | primary key |
| issuer_type | select | `individual` \| `seller_group` \| `guild` |
| issuer_id | uuid | issuing identity |
| tag_type | select | `yam_is_on` \| `seeking_gratitude` |
| authorized_quantity | integer | initial Organized Krill lot is normally `10`; later lots configurable |
| issued_quantity | integer | denominator for the gate |
| valid_response_count | integer, derived | accepted + qualifying rejected two-device responses |
| accepted_delivery_count | integer, derived | reported separately |
| rejected_response_count | integer, derived | reported separately |
| unanswered_count | integer, derived | never qualifies |
| confirmation_rate | decimal, derived | `valid_response_count / issued_quantity` |
| reissuance_eligible | boolean, derived | `confirmation_rate >= 0.51` |
| status | select | `authorized` \| `active` \| `threshold_reached` \| `closed` \| `suspended` \| `revoked` |

For an issued lot of size `N`, the required response count is `ceil(0.51 × N)`. A 10-pack therefore requires 6 valid responses. Self-scans, duplicates, expired sessions, reused nonces, same-identity confirmations, and unverified interactions do not qualify.

### `yam_transaction`

| Field | Type | Notes |
|---|---|---|
| transaction_id | uuid | primary key |
| voucher_id | uuid | unique YAM-is-ON tag/sticker |
| issuance_lot_id | uuid | → `issuance_lot` |
| seller_id | uuid | MEGAvoter seller acting as VFN |
| buyer_id | uuid | registered buyer |
| inventory_unit_id | uuid | one physical unit/service slot; immutable rail after acceptance |
| gross_sale_reported | decimal | canonical `$30.00` |
| cogs_reported | decimal | canonical `$10.00` |
| seller_margin | decimal | canonical `$9.70` |
| buyer_rebate_due | decimal | canonical `$5.00` |
| social_impact_due | decimal | canonical `$4.00` |
| patronage_due | decimal | canonical `$1.00` |
| pod_due | decimal | canonical `$0.30` |
| external_payment_reference | text, nullable | opaque seller/payment-provider reference; no credentials |
| payment_reported_at | datetime, nullable | seller testament |
| delivery_event_id | uuid | accepted two-device event |
| quarter_id | taxonomy ref | applicable 12-week dataset |
| state | select | `issued` \| `pending` \| `matured` \| `disputed` \| `extinguished` |
| extinguishment_reason | select, nullable | `quarterly_settled` \| `reversed` \| `expired` \| `withdrawn` \| `resolved_other` |

### `seeking_gratitude_transaction`

| Field | Type | Notes |
|---|---|---|
| transaction_id | uuid | primary key |
| tag_id | uuid | unique Thanking tag/sticker |
| issuance_lot_id | uuid | → `issuance_lot` |
| sender_id | uuid | individual, group, guild, sponsor, or messenger |
| recipient_id | uuid | accepting device |
| inventory_unit_id | uuid | cannot also resolve as YAM-is-ON |
| nominal_xp_pattern | decimal | `$30.00` accounting mirror only |
| xp_delta | integer | Experience Presence issuance |
| delivery_event_id | uuid | accepted two-device event |
| quarter_id | taxonomy ref | |
| financially_redeemable | boolean | hard-coded `false` |
| state | select | `issued` \| `pending` \| `matured` \| `disputed` \| `extinguished` |

### `vfn_monthly_testament`

The MEGAvoter seller prepares and posts this testament directly to the XP General Ledger. No separate VFN receives or verifies it.

| Field | Type | Notes |
|---|---|---|
| testament_id | uuid | primary key |
| seller_id | uuid | MEGAvoter acting as VFN |
| period_start | date | |
| period_end | date | last calendar day |
| posted_at | datetime | append-only timestamp |
| previous_testament_hash | text | chains seller statements |
| issued_count | integer | |
| pending_count | integer | |
| matured_count | integer | matured, awaiting applicable quarterly settlement |
| disputed_count | integer | |
| extinguished_count | integer | |
| gross_fiat_sales_reported | decimal | seller testament, not ledger custody |
| community_obligation_reported | decimal | sum of `$10.30` obligations |
| buyer_rebate_due | decimal | |
| social_impact_due | decimal | |
| patronage_due | decimal | |
| pod_due | decimal | |
| attestation_text | text | explicit seller/VFN declaration |
| supporting_reference_hash | text | references evidence without storing banking data |
| testament_hash | text | immutable statement hash |

The ledger may append `scan_correlated`, `buyer_confirmed`, `variance_detected`, `disputed`, `corrected_by_appendix`, or `quarterly_reconciled` events. It must never overwrite the seller's original testament or label it independently verified merely because it was posted.

### `quarterly_settlement_record`

| Field | Type | Notes |
|---|---|---|
| settlement_id | uuid | primary key |
| seller_id | uuid | seller/VFN |
| quarter_id | taxonomy ref | closed 12-week dataset |
| monthly_testament_ids | array | normally three statements |
| dataset_cutoff_at | datetime | |
| eligible_matured_total | decimal | |
| disputed_carry_forward_total | decimal | |
| extinguished_without_settlement_total | decimal | |
| settled_total | decimal | |
| settlement_posted_at | datetime | |
| external_evidence_hash | text | no payment credentials |

Monthly testaments are reconciliation artifacts, not disbursement events. All eligible buyer, social-impact, patronage, and PoD disbursements are recorded at the applicable quarterly close to mirror the closed behavioral dataset.

---

## 2. Taxonomies

- `response_type`: participate, observe, walk_away
- `role`: megavoter, yamer, walk_away, unreached
- `peace_pentagon_branch`: planning, budget, media, distribution, membership
- `media_type`: video, podcast, guide, download
- `quarter`: one term per 12-week window (e.g., `2027-Q3`)
- `access_point`: yam_is_on_voucher, gratitude_hang_tag_sticker, rsvp_postcard, peace_pentagon_business_card

---

## 2a. Access points → XP leaderboard

Four physical objects are the only ways into the study. Each one carries a scannable code that resolves to a `device_id`, and each scan can add to `xp_total`. None of the four ever carries a price, balance, or payment method.

| Access point | Carries | Scans to |
|---|---|---|
| YAM-is-ON voucher | Banking declaration for a seller-reported `$30` sale | `qr_scan_event` (type = `banking_yam_is_on`) |
| Seeking Gratitude hang tag/sticker | nonfinancial service and gratitude recognition | `qr_scan_event` (type = `thanking_seeking_gratitude`) |
| RSVP postcard | `postcard_uuid` | `participant` lookup + pickup status |
| Peace Pentagon business card | branch + device UUID | `participant.peace_pentagon_branch` |

---

## 3. Append-only ledger: `qr_scan_event`

This is the event log referenced throughout the site ("one scan, one choice, one event"). Off-chain hot storage (Postgres) holds the full row; only a hash of the accepted event is anchored to HCS. Never updated in place — corrections append a new row.

| Field | Type | Notes |
|---|---|---|
| qr_type | select | `identity` \| `banking_yam_is_on` \| `thanking_seeking_gratitude` |
| transaction_rail | select | `yam_is_on` (seller reports `$30` commerce) \| `seeking_gratitude` (no money accepted; XP only) |
| interaction_id | uuid | ties the initiating scan to the second-device response |
| initiator_id | uuid | seller/sender device |
| counterparty_id | uuid | buyer/recipient device; must differ from initiator |
| device_id | uuid | pseudonymous, joins to `participant` |
| device_fingerprint | text | client-side fingerprint, hot storage only |
| session_id | uuid | |
| qr_code_id | text | rotating or single-use; a static/photographable code is invalid |
| qr_nonce | uuid | single-use; consumed on first accepted scan, then dead |
| laugh_event_id | relationship | → `laugh_event` |
| client_timestamp | datetime | captured client-side at scan |
| geohash | text | precision ~8 (≈38m × 19m cell), used only to narrow candidates |
| lat_long | geo | raw coordinates; the actual 50m accept/reject check is a haversine calculation, not the geohash cell |
| time_bucket_id | integer | `floor(timestamp / 180s)` — supports the 3-minute throttle |
| throttle_result | select | `accepted` \| `rejected_duplicate` \| `rejected_out_of_range` — rejected scans are logged off-chain only and never hashed to HCS |
| witness_list | array of device_id | other devices in the same spatial+temporal bucket |
| witness_weight | decimal | decayed (sqrt or log of witness count) — not linear, so a few colluding devices can't fake a crowd |
| xp_delta | integer | this scan's XP change only — never a running total, see §6 |
| response | select | `accepted` \| `rejected` \| `no_response` \| `disputed` |
| state | select | `issued` \| `pending` \| `matured` \| `disputed` \| `extinguished` |
| consent_hash | text | hash of the consent record accepted before this participant's first scan |
| consent_version | text | |
| schema_version | text | this document's version |
| ipfs_cid | text | optional — if the raw payload is batched to IPFS, its content ID |
| hcs_topic_id | text | one topic per `laugh_event`/campaign |
| hcs_consensus_timestamp | datetime | returned by HCS once the event hash is accepted; this is the tamper-evident, fairly-ordered time of record — not the client timestamp |

Identity QR captures pseudonymous v-card metadata. Banking/YAM-is-ON connects a seller-reported `$30` sale to the seller/VFN testament and quarterly obligation record. Thanking/Seeking Gratitude records accepted or rejected nonfinancial service; accepted service contributes an `xp_delta`.

One inventory unit may resolve to exactly one transaction rail. The rail becomes immutable when the second device accepts delivery.

### `rejected_scan_log`
Off-chain only, never hashed to HCS. Used for fraud analytics, not for participant-facing data. Same shape as `qr_scan_event` minus the HCS/IPFS fields, plus a `rejection_reason`.

---

## 3a. Public verification layer

| Field | Type | Notes |
|---|---|---|
| mirror_node_query_endpoint | url | Hedera Mirror Node REST API — public, free, rate-limited to 100 req/s, not production-guaranteed uptime |
| production_mirror_node | url | dedicated or third-party hosted (e.g. HashScan, DragonGlass) — required before real launch, not an afterthought |
| verification_response | object | given a `qr_scan_event` or checkpoint ID, returns the HCS consensus timestamp and Merkle proof path, so an auditor/regulator can verify a claim independent of Codepixelzmedia's servers |

---

## 4. Quarter / reconciliation calendar

| Event | Timing |
|---|---|
| Quarter (12-week window) | fixed study cohort/window; all activity closes as one dataset |
| Monthly seller/VFN testament | posted by each MEGAvoter seller on the last calendar day |
| Quarterly reconciliation and settlement | after the twelve-week dataset closes; uses the applicable monthly testaments and event record |
| Annual reconciliation | August 31 |
| Redemption Day | September 1 (starting 2027, annual) |
| Pilot expansion decision point | August 11, 2027 (single CEI site → up to 100 licensed centers) |
| Testnet → mainnet genesis moment | May 17, 2030 — every HCS-anchored hash from the testnet period carries forward as the proof trail into the mainnet foundation; not a new starting point |
| First mainnet settlement | September 1, 2030 — the same Redemption Day rhythm, now on the mainnet foundation |
| Testnet control-group window | 2030–2040 (10 years post-genesis) — 1% of activity deliberately stays in the testnet environment as a standing control group, never migrated to mainnet |

---

## 5. Relationships at a glance

```
participant (1) ── role ──> megavoter | yamer | walk_away | unreached
participant (1) ── selects ──> peace_pentagon_branch
participant (1) ── generates many ──> qr_scan_event
laugh_event (1) ── has many ──> qr_scan_event
laugh_event (1) ── has many ──> sponsorship
sponsorship (1) ── packaged_by ──> participant (role = megavoter)
sponsorship (1) ── settles ──> stone_inventory.backorder_status
resource (many) ── related_lesson ──> site page/lesson
```

---

## 6. XP ledger computation & checkpointing

- XP is **event-sourced**. `xp_total` is never a mutable stored field — it's the sum of `qr_scan_event.xp_delta` rows for a `device_id`, computed by replay and served from a cache, not recomputed from full history on every request.
- A periodic (e.g. daily) `xp_checkpoint` job computes a Merkle root over all current balances and anchors only that root to HCS — one HCS message per checkpoint, not one per XP mutation. This is what keeps HCS cost bounded (see cost checkpoints below) while still making the ledger tamper-evident.

### `xp_checkpoint`
| Field | Type | Notes |
|---|---|---|
| checkpoint_date | date | |
| merkle_root | text | root hash over all `device_id` → `xp_total` balances at this checkpoint |
| hcs_topic_id | text | |
| hcs_consensus_timestamp | datetime | |
| included_device_count | integer | |

---

## 7. Throttle logic (implements Codepixelzmedia's Phase 3)

This is what turns "a code was scanned" into "a human was plausibly here," entirely off-chain, before anything is hashed:

1. **Spatial gate:** `geohash` narrows candidate rows only; the real accept/reject decision is a haversine distance check against `lat_long`, since fixed grid cells create edge effects at the ~50m boundary.
2. **Temporal gate:** reject a new scan from the same `device_id` at the same geofence if it falls inside 3 minutes (`time_bucket_id`) of the last accepted scan.
3. **GPS margin:** consumer GPS drifts 5–15m typically, worse indoors. Treat 50m as an outer bound, not a tight tolerance; Wi-Fi/Bluetooth beacon corroboration is worth adding at venues where tighter precision matters.
4. **Witness weighting:** `witness_weight` uses a decayed function (sqrt or log of witness count), never linear — this is what stops a handful of colluding devices from faking a crowd.
5. **Cost payoff:** anything that fails the throttle is written to `rejected_scan_log` and never hashed or submitted to HCS — this is what keeps message volume bounded to genuine events.

Reference cost model from Codepixelzmedia (at $0.0008/HCS message, accepted-event batching only): ~$1,200/month at 5,000 users (Pilot), ~$24,000/month at 100,000 users (Growth), ~$240,000/month at 1,000,000 users (Scale). Confirm these against real Phase 8 load-test numbers before committing to a production budget — HCS pricing already rose 8x in January 2026.

---

## 8. Notes for Cursor / Codepixelzmedia

1. Build `participant` as gated/private data first — nothing here should be publicly queryable per-person. Community Pulse and Community Reflection only ever read aggregates.
2. `qr_scan_event` should be genuinely append-only at the database layer (no UPDATE, no DELETE) — enforce with a trigger or a write-once table, not just app-level convention.
3. Keep payment custody outside the XP ledger. The YAM JAM integration may post an opaque external payment reference and seller attestation to `yam_transaction`; never store card data, bank credentials, wallet private keys, or withdrawable balances in this plugin.
4. `surplus_flag` on `sponsorship` should hard-block save (or route to manual review) rather than silently accept — this is a business rule from the pilot, not a UI nicety.
5. Follow Codepixelzmedia's Implementation Journey phase order (Environment → Data Model → QR Capture → Throttle → HCS Integration → Off-Chain Storage → XP Computation → Audit Layer → Testing → Launch) rather than building HCS integration before the throttle logic exists — a scan that hasn't passed the throttle should never reach Phase 4's `ConsensusSubmitMessage` call.
6. `AccountBalanceQuery` is deprecated from the Hiero SDKs (fully removed July 2026) — read any balance/state needs from the Mirror Node REST API instead, not from that call.
7. QR codes must rotate or be single-use (`qr_nonce` consumed on first scan) — a static, photographable code invalidates the entire presence claim this schema is built to support.
8. Treat the MEGAvoter seller as VFN for that seller's own YAM-is-ON vouchers. The seller posts the month-end testament directly; do not invent a separate VFN reviewer or mark the attestation verified merely because it was posted.
9. Enforce the 51% reissuance threshold per issuing identity and current lot. Never calculate it as a lifetime cumulative rate, and never pool a member's personal lot into a group/guild lot.
10. Monthly testaments are reconciliation artifacts. Monetary settlement is recorded only at the applicable twelve-week quarterly close so the fiat testament and XP Presence dataset share the same reporting boundary.

---

## 9. Testnet XP immutability (May 2030 Detente model)

Source: `TESTNET-EXPLAINED.md` (Coach Tom / platform architecture, 2026).

### Principles

1. **Pre-genesis (now through May 16, 2030):** 100% of Human Gold Rush presence accrues as testnet XP — proof of human presence, not financial value.
2. **May 17, 2030 (genesis):** Mainnet may adopt **99%** of the proven operational framework. **At least 1%** remains a permanent human-behavior testnet; it is never migrated, consumed, or extinguished.
3. **2030–2040:** The standing 1% testnet control group continues as a ten-year observation window (see `participant.network_environment = testnet_control_group`).
4. **May 17, 2040:** Next Detente moment; testnet presence history from the prior cycle is **carried forward**, not reset.

### Testnet XP lifecycle (presence record)

Use for `qr_scan_event` / XP presence — **not** for fiat obligations:

| Stage | Meaning |
|---|---|
| `observed` | Scan or interaction recorded |
| `confirmed` | Two-device or witness-weighted acceptance |
| `reconciled` | Included in May 16 / quarterly snapshot |
| `recognized` | Interpretation attached; disputes may qualify, not erase |
| `carried_forward` | Permanent retention; never extinguished |

**Forbidden for testnet XP:** `extinguished`, `redeemed`, `transferred`, `spent`, `deleted`, or in-place UPDATE of historical presence rows.

### Extinguishment scope

`extinguished` (and `extinguishment_reason`) in §3 obligation tables applies only to:

- fiat-side obligations outside the XP presence ledger, and
- mainnet settlement entries after genesis,

— **never** to testnet XP proof-of-presence, consent events, or behavioral append-only evidence. If a pledge obligation is extinguished, the underlying presence events remain.

### Reconciliation vs disposition

Quarterly and annual reconciliation produces a **dated interpretation** (snapshot, testament, merkle checkpoint) — not a terminal disposition of presence. May 16 reconciliation → May 17 genesis references operational lessons; it does not consume underlying XP rows.

### Implementation notes for Cursor

1. Enforce separate tables or `record_layer` discriminator: `presence` | `fiat_obligation` | `mainnet_settlement`.
2. Database triggers: reject UPDATE/DELETE on testnet presence events; corrections via appended `CORRECTION_POSTED` events only.
3. Admin UI: warn if any migration or report treats testnet XP as extinguishable.
4. Public copy: never promise redemption, transfer, or reset of testnet presence.
