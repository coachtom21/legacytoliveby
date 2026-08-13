# Platform Mentorship — Utsav as Platform Steward

Source: [ChatGPT Mentorship thread](https://chatgpt.com/share/6a71f5bb-a8b0-83ea-9668-8cffdfe51b36) (Codepixelzmedia / Cursor-enabled platform stewardship).

## Central rule

> **GitHub remembers the code. WordPress operates the program. Discord organizes the people. The append-only ledger preserves the evidence. Utsav controls what moves between them.**

Utsav should be mentored as the **platform steward** — not merely the WordPress developer. Cursor functions as an engineering assistant, not as the platform’s autonomous decision-maker.

---

## 1. Start with responsibilities, not technology

Before writing code, Utsav should explain the platform in plain language:

1. A person receives or scans a Practice FAITH postcard.
2. Their device is registered with consent.
3. They choose Participate, Observe, or Walk Away.
4. A touchstone RSVP or eligible backorder is recorded.
5. Two scans can confirm fulfillment or Proof of Delivery.
6. The transaction progresses through issued, pending, matured, disputed, or extinguished.
7. Discord supports the community experience.
8. The ledger records evidence without holding money or crypto.
9. Monthly VFN statements are posted for comparison.
10. Quarterly reconciliation closes each 12-week research window.

If Cursor produces code that does not clearly support one of these responsibilities, it probably does not belong in the initial platform.

---

## 2. Give each platform one clear job

| Platform | Primary responsibility | Must not become |
|----------|------------------------|-----------------|
| **WordPress** | Public pages, registration, consent, RSVP and role selection | The permanent authoritative ledger |
| **WooCommerce** | $0 backorders, membership eligibility and fulfillment workflow | A custodian of XP or simulated money |
| **PHP/MySQL** | Business rules, device events, state transitions and integrations | An uncontrolled collection of plugin hooks |
| **Discord** | Welcome flow, lesson plans, branch communities and event coordination | The official record of consent or fulfillment |
| **GitHub** | Versioned source code, documentation, issues and releases | A storage place for private participant data |
| **Cursor** | Code generation, refactoring, tests and documentation | The authority that changes economic or research rules |
| **XP ledger** | Append-only evidence and transaction status history | A financial account or payment processor |

Discord messages may encourage participation, but the **WordPress workflow must capture structured choices**. Discord activity alone should never be treated as verified presence.

---

## 3. Build one canonical event model

The most important technical artifact is not a webpage. It is a **shared event vocabulary** used across WordPress, Discord integrations, statements and the ledger.

Examples:

- `DEVICE_REGISTERED`
- `CONSENT_RECORDED`
- `RSVP_CREATED`
- `ROLE_SELECTED`
- `WALK_AWAY_RECORDED`
- `BACKORDER_CREATED`
- `DELIVERY_SCAN_STARTED`
- `DELIVERY_CONFIRMED`
- `DELIVERY_DISPUTED`
- `OBLIGATION_MATURED`
- `XP_EXTINGUISHED`
- `VFN_STATEMENT_POSTED`
- `QUARTER_RECONCILED`

Each event should contain only what is needed:

- unique event ID
- pseudonymous device ID
- actor role
- event type
- timestamp
- relevant RSVP, order or fulfillment reference
- consent version
- status before and after
- evidence hash or external timestamp reference
- software version that created it

This makes WordPress replaceable later without destroying the research history.

See also: `LLB-Human-Gold-Rush-Schema.md`.

---

## 4. Make the state machine explicit

Cursor should never infer how a transaction advances. Utsav should provide a written transition table.

| Current status | Permitted next status | Required evidence |
|----------------|----------------------|-------------------|
| Issued | Pending | RSVP, pledge or eligible order event |
| Pending | Matured | Required delivery confirmation plus 12-week maturity |
| Pending | Disputed | Conflicting scan, missing fulfillment or authorized challenge |
| Disputed | Pending or Matured | Documented human reconciliation |
| Matured | Extinguished | Authorized quarterly accounting event |
| Extinguished | None | Append-only final status; correction requires a new event |

The historical record is **never edited**. If something is wrong, a correcting event is appended.

---

## 5. Preserve the Human Gold Rush separation

The Human Gold Rush statement centers gratitude as the “1% that no amount of money can buy.” Utsav must preserve that distinction in both language and architecture:

- Seeking Gratitude records Experience Presence and never creates remuneration.
- YAM-is-On belongs to the separate pledge/trade comparison.
- The shared $10.30 accounting structure does not make the two instruments interchangeable.
- XP does not hold dollars, crypto, debt or redeemable financial value.
- The VFN statement is a non-custodial comparison testament supplied by the MEGAvoter acting as VFN.
- Walk Away is valid behavioral evidence, not an unsuccessful conversion.
- **Research equality:** never use plain `=` in monetary/XP/YAM/NWP formulas — use dotted `≐` only (see `RESEARCH-EQUALITY.md`).

These should become **automated tests and administrative warnings** — not merely paragraphs in documentation.

---

## 6. Use GitHub as the control center

Organize work into traceable issues rather than asking Cursor to “build the whole platform.”

### Issue structure

- Purpose and user story
- Acceptance criteria
- Privacy implications
- Ledger events created
- Allowed status transitions
- WordPress tables affected
- Discord behavior affected
- Tests required
- Rollback procedure
- Human approval required

### Change workflow

1. GitHub issue approved.
2. Utsav asks Cursor for a narrowly scoped implementation plan.
3. Cursor works on a feature branch.
4. Automated tests run.
5. Utsav reviews the code and generated database migration.
6. Staging deployment is tested with synthetic participants.
7. Human approval authorizes production release.
8. A tagged release documents exactly what changed.

Cursor may propose code. It should **never** independently merge, deploy, change ledger formulas or reinterpret the Human Gold Rush rules.

---

## 7. Develop in vertical slices

Build order:

1. **RSVP slice** — Postcard scan → consent → device registration → Participate/Observe/Walk Away → RSVP record.
2. **Fulfillment slice** — Touchstone reservation → LAUGH event check-in → two-scan confirmation → pending status.
3. **Maturity slice** — Twelve-week clock → dispute handling → matured status → quarterly reconciliation.
4. **Community slice** — Discord welcome, Peace Pentagon branch selection, lesson access and LAUGH announcements.
5. **Statement slice** — MEGAvoter/VFN monthly statement → append-only posting → quarterly comparison report.
6. **Leadership slice** — XP leaderboard → August 11 snapshot → Top 100 POCs and name-only leadership assignments.

Deliver a testable research loop before adding larger YAM JAM or 2030 settlement concepts.

---

## Standing Cursor instruction

Use at the beginning of each Cursor session:

> You are assisting with the Human Gold Rush platform. Treat GitHub as the canonical source for code and documentation, WordPress/WooCommerce as the participant and fulfillment interface, Discord as the community environment, and the XP ledger as an append-only evidence record. Do not create financial custody, redeemable XP, or automatic economic decisions. Preserve Participate, Observe, and Walk Away as equally valid research responses. Never mutate historical ledger events. Implement only the GitHub issue currently approved, identify affected data and rules before editing, write tests for every state transition, and stop for human review before migrations, deployments, security changes, formula changes, or ledger-policy changes.

---

## Mentoring roles

| Role | Responsibility |
|------|----------------|
| **Mentor (ChatGPT / Coach Tom)** | Translate concepts into requirements and acceptance tests |
| **Utsav** | Accountable technical steward; validates practicality |
| **Cursor** | Code, tests, documentation |
| **GitHub** | Preserves approved decisions |
| **Codepixelzmedia** | Staging, deployment, operational support |
| **Coach Tom** | Approves changes to meaning, membership, accounting, or research consent |

Technology can manage the workflow, but a **human must accept the proof**.

---

## Related media (developer onboarding)

- Video: [Mentorship doc video](https://drive.google.com/file/d/1g6gL8IPl80seIZwQVwbEBbZP7-XNCU_d/view)
- Podcast: [Mentorship doc podcast](https://drive.google.com/file/d/1Or5vyL-1LlInLl0cVTToMomq-xHvLTta/view)
