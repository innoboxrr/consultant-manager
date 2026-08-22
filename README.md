# Consultant Manager

**A consultation platform, as a Laravel package.**

Everything a practice needs to run consultations online: professionals and their availability, the people they see, the sessions themselves, the records that accumulate, and the money.

## What it models

**The professional side**
`Consultant` · `ConsultantAvailability` · `ConsultantTeamMember` · `ConsultantRecordTemplate` — profiles with typed status, bookable availability, teams, and reusable templates for the records they keep.

**The client side**
`Consultee` · `ConsulteeRecord` · `ConsulteeRecordCategory` · `ConsulteeRecordItem` · `ConsulteeRecordResponse` — a structured, categorised history per person, rather than a pile of free-text notes.

**The consultation**
`ConsultationAppointment` · `ConsultationAppointmentAttendee` · `ConsultationSession` · `ConsultationService` · `ConsultationSessionService` — scheduling, who attends, and what was actually delivered.

**Communication**
`ConsultationChat` · `ConsultationChatMessage` · `ConsultationPost` · `ConsultationPostAttachment` · `ConsultationAdvice` — asynchronous follow-up between sessions.

**Intake and outcome**
`ConsultationIntakeForm` · `ConsultationEvaluation` — what you collect before, and what you assess after.

**Money**
`ConsultationPrice` · `ConsultationPayment` — pricing per service, and payment records against sessions.

## The architecture

Every model follows the same layered shape — `Filters/`, `Operations/`, `Relations/`, `Mutators/`, `Storage/`, `Assignments/` — so a package of this size stays navigable. Consultant status and type are proper PHP enums, not magic strings.

## Install

```bash
composer require innoboxrr/consultant-manager
php artisan vendor:publish --tag=consultant-manager-config
php artisan migrate
```

---

Part of [Innobox R&R](https://github.com/innoboxrr) — 52 open-source packages extracted from production work. **[innobox.systems](https://innobox.systems)**
