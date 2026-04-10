<?php

namespace Database\Seeders;

use App\Enums\ProjectRole;
use App\Enums\ProjectType;
use App\Models\Company;
use App\Models\Project;
use Database\Seeders\Concerns\BuildsTranslations;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    use BuildsTranslations;

    public function run(): void
    {
        DB::transaction(function (): void {

            foreach ($this->projects() as $projectData) {

                $company = Company::query()->firstOrCreate(
                    ['slug' => Str::slug($projectData['company'])],
                    [
                        'slug' => Str::slug($projectData['company']),
                        'name' => $projectData['company'],
                    ],
                );

                $mainTags = $projectData['main_tags'] ?? [];
                $techTags = $projectData['tags'] ?? [];

                unset($projectData['company'], $projectData['main_tags'], $projectData['tags']);

                $projectData['company_id'] = $company->id;

                $project = Project::query()->updateOrCreate(
                    ['slug' => $projectData['slug']],
                    $projectData
                );

                $project->syncTagsWithType(
                    collect($mainTags)
                        ->map(fn($tag) => $tag->value)
                        ->toArray(),
                    'main'
                );

                $project->syncTagsWithType($techTags, 'tech');

                $this->syncMedia($project);
            }
        });
    }

    private function projects(): array
    {
        return [
            [
                'company' => 'Techfly',
                'slug' => Str::slug('Kheops'),
                'name' => 'Kheops',
                'header' => [
                    'en' => 'AI-powered platform for business automation and contextual intelligence.',
                    'fr' => 'Plateforme IA pour l’automatisation des processus métier et l’intelligence contextuelle.',
                    'ar' => 'منصة مدعومة بالذكاء الاصطناعي لأتمتة الأعمال وفهم البيانات بشكل سياقي.',
                ],
                'description' => [
                    'en' => 'Enterprise AI platform integrating LLMs, RAG pipelines, and automation.',
                    'fr' => 'Plateforme IA entreprise intégrant LLM, pipelines RAG et automatisation.',
                    'ar' => 'منصة ذكاء اصطناعي للمؤسسات تدمج نماذج اللغة الكبيرة وأنظمة RAG والأتمتة.',
                ],
                'link' => 'https://kheops.ai',
                'main_tags' => [
                    ProjectRole::BACKEND,
                    ProjectRole::FULLSTACK,
                ],
                'is_featured' => true,
                'tags' => ['AI', 'LLM', 'RAG', 'API', 'SaaS'],
                'start' => '2023-08-01',
                'end' => '2024-10-01',
                'details' => [
                    'en' => "# Kheops AI — Engineering an Enterprise AI Automation Platform

Kheops is an enterprise-grade AI platform built to help organizations **unlock the value of their internal data** through contextual intelligence, automation, and scalable AI workflows.

Modern companies generate large volumes of unstructured data (documents, audio, internal knowledge), but lack the infrastructure to transform it into actionable insights.

## The Challenge

The core challenge was building a system capable of:

- Processing heterogeneous and unstructured data sources
- Providing accurate, context-aware AI responses
- Ensuring scalability across multiple business use cases
- Integrating seamlessly with existing enterprise systems

Traditional AI tools often fail due to lack of context, poor retrieval, or limited integration capabilities.

## The Approach

The platform was designed around a **modular, API-first architecture**, with a strong focus on data pipelines and retrieval quality.

Key components include:

- **RAG (Retrieval-Augmented Generation) pipeline** for grounding LLM responses in real data
- Data ingestion pipelines to normalize and structure raw inputs (documents, audio, metadata)
- Hybrid search (vector + keyword) for high-precision retrieval
- AI agents to automate workflows and business processes
- Scalable API layer for integrations and extensibility

From an architectural standpoint:

- The system is designed for horizontal scalability
- Services are decoupled for flexibility and maintainability
- Emphasis was placed on performance, latency, and response accuracy

## My Contribution

- Designed and implemented core backend architecture
- Built APIs for AI services and third-party integrations
- Developed data ingestion and processing pipelines
- Implemented RAG workflows and retrieval optimization
- Contributed to frontend features for AI interaction
- Optimized performance and system scalability

## Outcome

Kheops delivers a powerful AI layer for businesses, enabling:

- Context-aware AI responses grounded in internal data
- Automation of repetitive and knowledge-based tasks
- Efficient processing of large-scale unstructured data
- Improved decision-making through intelligent insights

## Takeaways

Building effective AI systems goes beyond models.

It requires **robust backend architecture, high-quality data pipelines, and strong retrieval mechanisms** to deliver reliable and scalable results.",

                    'fr' => "# Kheops AI — Conception d’une plateforme IA entreprise

Kheops est une plateforme IA conçue pour permettre aux entreprises de **valoriser leurs données internes** grâce à l’intelligence contextuelle et à l’automatisation.

## Le défi

Les entreprises font face à plusieurs problématiques :

- Traitement de données non structurées
- Manque de contextualisation des réponses IA
- Difficulté à intégrer l’IA dans les systèmes existants
- Passage à l’échelle des solutions

## L’approche

La plateforme repose sur une architecture **modulaire et orientée API** :

- Pipeline RAG pour améliorer la pertinence des réponses
- Pipelines d’ingestion pour structurer les données
- Recherche hybride (vectorielle + mots-clés)
- Agents IA pour automatiser les პროცეს métiers
- API scalable pour intégrations

## Ma contribution

- Conception de l’architecture backend
- Développement des API IA
- Mise en place des pipelines de données
- Optimisation des performances

## Résultat

Une plateforme capable de :

- Fournir des réponses IA contextuelles
- Automatiser les პროცეს métier
- Exploiter efficacement les données internes

## Conclusion

Un système IA performant repose avant tout sur **l’architecture et la gestion des données**.",

                    'ar' => "# Kheops AI — بناء منصة ذكاء اصطناعي للمؤسسات

Kheops هي منصة ذكاء اصطناعي موجهة للمؤسسات، تهدف إلى **استخراج القيمة من البيانات الداخلية** عبر الأتمتة والفهم السياقي.

## التحدي

الشركات تواجه عدة صعوبات:

- التعامل مع بيانات غير منظمة
- ضعف دقة إجابات الذكاء الاصطناعي بدون سياق
- صعوبة دمج الحلول مع الأنظمة الحالية
- التوسع في استخدام الذكاء الاصطناعي

## الحل

تم بناء المنصة باستخدام بنية **مرنة وقائمة على API**:

- نظام RAG لتحسين دقة الإجابات
- خطوط معالجة البيانات لتنظيم المدخلات
- بحث هجين (Vector + Keywords)
- وكلاء ذكاء اصطناعي لأتمتة العمليات
- واجهات API قابلة للتوسع

## مساهمتي

- تصميم وتطوير البنية الخلفية
- بناء واجهات API للذكاء الاصطناعي
- تطوير أنظمة معالجة البيانات
- تحسين الأداء وقابلية التوسع

## النتيجة

منصة تمكن من:

- تقديم إجابات ذكية مبنية على البيانات الداخلية
- أتمتة العمليات المتكررة
- تحسين اتخاذ القرار

## الخلاصة

نجاح أنظمة الذكاء الاصطناعي يعتمد على **جودة البنية والبيانات** وليس فقط على النماذج.",
                ],
            ],
            [
                'company' => 'Techfly',
                'slug' => Str::slug('GCCO'),
                'name' => 'GCCO Reservation Platform',
                'header' => [
                    'en' => 'Flexible multi-user reservation system.',
                    'fr' => 'Système de réservation flexible multi-utilisateurs.',
                    'ar' => 'نظام حجز مرن يدعم تعدد المستخدمين.',
                ],
                'description' => [
                    'en' => 'Advanced booking platform with shared capacity logic.',
                    'fr' => 'Plateforme de réservation avancée avec gestion de capacité partagée.',
                    'ar' => 'منصة حجز متقدمة تعتمد على منطق السعة المشتركة.',
                ],
                'link' => 'https://reservation.gcco.dz/',
                'main_tags' => [
                    ProjectRole::BACKEND,
                    ProjectRole::FULLSTACK,
                ],
                'is_featured' => true,
                'tags' => ['Reservation', 'Concurrency', 'API'],
                'start' => '2023-03-01',
                'end' => '2023-10-01',
                'details' => [
                    'en' => "# GCCO Reservation Platform — Engineering a Capacity-Driven Booking System

The GCCO platform is a reservation system built to support **shared space booking with dynamic capacity management**, enabling multiple users to reserve the same resource simultaneously under controlled constraints.

Unlike traditional booking systems, this platform introduces a more advanced model where availability is not binary, but computed based on real-time capacity and business rules.

## The Challenge

Standard reservation systems rely on fixed time slots with single occupancy. GCCO required a more complex model involving:

- Multiple concurrent reservations on the same resource
- Capacity-based availability instead of slot-based blocking
- Overlapping bookings with conditional validation
- High consistency under concurrent user activity

These constraints introduce significant complexity in both **data modeling and transaction handling**.

## The Approach

The system was designed around a **capacity-driven reservation engine**, where availability is dynamically calculated.

Core implementation aspects include:

- Real-time evaluation of reservations based on remaining capacity
- Support for overlapping bookings with constraint validation
- Layered validation architecture:
  - Input validation (request integrity)
  - Business rules (capacity limits, overlap conditions)
  - Database-level guarantees (transactions and locking)

From an architectural perspective:

- Strong emphasis on **transactional integrity** to prevent race conditions
- Use of **atomic operations and database constraints** for consistency
- API-first design to support frontend and mobile clients
- Modular structure to allow future extension of booking rules

## My Contribution

- Designed and implemented the full backend architecture
- Built the core reservation engine with capacity logic
- Modeled complex booking rules and edge cases
- Implemented concurrency-safe operations
- Developed APIs for frontend and mobile integration
- Contributed to frontend implementation when required

## Outcome

The platform delivers a robust and flexible reservation system that:

- Supports shared bookings without conflicts
- Maintains strict data consistency under concurrent usage
- Adapts to complex business rules and evolving requirements
- Provides a smooth and reliable user experience

## Takeaways

Reservation systems become complex when moving beyond simple models.

This project reinforced the importance of **concurrency control, transactional design, and precise business rule modeling** in building reliable, real-world systems.",

                    'fr' => "# Plateforme GCCO — Conception d’un système de réservation basé sur la capacité

La plateforme GCCO est un système de réservation conçu pour gérer des espaces partagés avec une **logique de capacité dynamique**.

## Le défi

Les systèmes classiques reposent sur un modèle simple (1 utilisateur = 1 créneau). Ici, il fallait gérer :

- Plusieurs réservations simultanées
- Une capacité partagée
- Des chevauchements conditionnels
- La cohérence en environnement concurrent

## L’approche

Une architecture basée sur un moteur de réservation dynamique :

- Calcul en temps réel de la disponibilité
- Validation des contraintes (capacité, chevauchement)
- Système de validation en couches
- Transactions pour garantir la cohérence

## Ma contribution

- Conception de l’architecture backend
- Développement du moteur de réservation
- Gestion des cas complexes et concurrence
- Création des API
- Contribution frontend

## Résultat

Une plateforme capable de :

- Gérer des réservations partagées
- Garantir la cohérence des données
- S’adapter à des règles métier complexes

## Conclusion

Ce projet met en évidence l’importance de la **gestion de la concurrence et des transactions** dans les systèmes de réservation.",

                    'ar' => "# منصة GCCO — نظام حجز يعتمد على السعة

منصة GCCO هي نظام حجز تم تصميمه لإدارة المساحات المشتركة باستخدام **منطق السعة الديناميكية**.

## التحدي

أنظمة الحجز التقليدية تعتمد على نموذج بسيط، لكن هذا المشروع تطلب:

- حجوزات متعددة في نفس الوقت
- إدارة السعة بدل الحجز الفردي
- التعامل مع التداخل بين الحجوزات
- ضمان التناسق مع تعدد المستخدمين

## الحل

تم بناء النظام حول محرك حجز يعتمد على السعة:

- حساب التوفر بشكل لحظي
- التحقق من القواعد (السعة، التداخل)
- نظام تحقق متعدد الطبقات
- استخدام المعاملات لضمان سلامة البيانات

## مساهمتي

- تصميم وتطوير البنية الخلفية
- بناء منطق الحجز الأساسي
- معالجة مشاكل التزامن
- تطوير واجهات API
- المساهمة في الواجهة الأمامية

## النتيجة

منصة توفر:

- حجز مرن للمساحات المشتركة
- حماية من التعارضات
- دقة عالية في البيانات

## الخلاصة

هذا المشروع يوضح أن أنظمة الحجز تتطلب **تحكم دقيق في التزامن والمعاملات** لضمان الموثوقية.",
                ],
            ],
            [
                'company' => 'Techfly',
                'slug' => Str::slug('PASSMEMO'),
                'name' => 'PASSMEMO',
                'header' => [
                    'en' => 'AI platform for structuring life stories.',
                    'fr' => 'Plateforme IA pour structurer les histoires de vie.',
                    'ar' => 'منصة ذكاء اصطناعي لتنظيم وتحويل قصص الحياة.',
                ],
                'description' => [
                    'en' => 'Dynamic data collection and processing system.',
                    'fr' => 'Système dynamique de collecte et de traitement des données.',
                    'ar' => 'نظام ديناميكي لجمع ومعالجة البيانات.',
                ],
                'link' => 'https://passmemo.fr/fr',
                'main_tags' => [
                    ProjectRole::BACKEND,
                ],
                'is_featured' => true,
                'tags' => ['Dynamic Forms', 'Data Processing', 'AI'],
                'start' => '2023-01-01',
                'end' => '2024-01-01',
                'details' => [
                    'en' => "# PASSMEMO — Structuring Human Narratives Through Data and AI

PASSMEMO is an AI-driven platform built for elderly care institutions, designed to **capture, process, and transform personal life stories into structured digital narratives**.

The platform bridges the gap between unstructured human input and usable, high-quality content through a combination of dynamic data modeling and processing pipelines.

## The Challenge

The system had to handle highly variable and sensitive data sources:

- Life stories collected through interviews and dynamic forms
- Audio recordings requiring transcription and transformation
- Evolving data structures depending on context and user profiles
- Need for consistency despite non-standardized inputs

This required a system that is both **flexible in input handling and strict in output structure**.

## The Approach

A **backend-centric architecture** was designed to support dynamic data ingestion and transformation.

At the core lies a **dynamic form engine**, allowing runtime definition of schemas without code changes. This enables:

- Adaptive questionnaires based on context
- Flexible data structures per use case
- Easy evolution of forms without redeployment

On top of this foundation, data processing pipelines were implemented to:

- Handle audio transcription workflows
- Normalize and clean heterogeneous data
- Map raw inputs into structured formats
- Prepare data for AI-driven narrative generation

From an architectural standpoint:

- Strong separation between data collection, processing, and output layers
- Emphasis on **data normalization and schema abstraction**
- API-first design for integration with frontend and content generation services
- Scalable pipeline design for handling increasing data volume

## My Contribution

- Designed and implemented the full backend architecture
- Built the dynamic form engine and schema system
- Developed data ingestion and processing pipelines
- Structured and normalized complex, unstructured datasets
- Designed APIs for frontend and AI integration
- Ensured scalability, maintainability, and extensibility

## Outcome

The platform enables institutions to:

- Capture rich and meaningful personal histories
- Convert unstructured input into structured, reusable data
- Generate readable and engaging narratives using AI
- Streamline data collection and processing workflows

## Takeaways

Working with human-centered data introduces unique complexity.

This project reinforced that **flexible data modeling, pipeline design, and separation of concerns** are critical when transforming unstructured inputs into scalable, structured systems.",

                    'fr' => "# PASSMEMO — Structuration des récits de vie avec l’IA

PASSMEMO est une plateforme IA conçue pour aider les établissements de soins à **collecter et structurer les histoires de vie** en contenus numériques exploitables.

## Le défi

Le système devait gérer :

- Des données non structurées issues d’interviews
- Des enregistrements audio à transcrire
- Des modèles de données évolutifs
- Une forte variabilité des entrées

## L’approche

Une architecture backend centrée sur la flexibilité :

- Moteur de formulaires dynamiques (sans modification de code)
- Pipelines de traitement pour structurer les données
- Normalisation des entrées
- Préparation pour génération de contenu IA

## Ma contribution

- Conception de l’architecture backend
- Développement du moteur de formulaires dynamiques
- Mise en place des pipelines de traitement
- Structuration des données complexes
- Création des API

## Résultat

Une plateforme permettant de :

- Capturer des récits de vie
- Structurer des données non organisées
- Générer du contenu exploitable

## Conclusion

Ce projet montre l’importance de la **modélisation flexible des données** et des pipelines dans les systèmes orientés données.",

                    'ar' => "# PASSMEMO — تنظيم قصص الحياة باستخدام الذكاء الاصطناعي

PASSMEMO هي منصة ذكاء اصطناعي موجهة لمؤسسات الرعاية، تهدف إلى **جمع وتحويل قصص الحياة إلى محتوى رقمي منظم**.

## التحدي

كان النظام بحاجة للتعامل مع:

- بيانات غير منظمة من مقابلات
- تسجيلات صوتية تحتاج إلى تحويل
- نماذج بيانات متغيرة
- اختلاف كبير في المدخلات

## الحل

تم بناء النظام على بنية خلفية مرنة:

- محرك نماذج ديناميكية بدون تعديل الكود
- خطوط معالجة لتنظيم البيانات
- توحيد البيانات
- تجهيزها لاستخدام الذكاء الاصطناعي

## مساهمتي

- تصميم وتطوير البنية الخلفية
- بناء نظام النماذج الديناميكية
- تطوير أنظمة المعالجة
- تنظيم البيانات المعقدة
- إنشاء واجهات API

## النتيجة

منصة تساعد على:

- حفظ قصص الحياة بشكل منظم
- تحويل البيانات غير المنظمة إلى محتوى مفيد
- تحسين سير العمل

## الخلاصة

هذا المشروع يبرز أهمية **المرونة في تصميم البيانات** عند التعامل مع معلومات بشرية غير منظمة.",
                ],
            ],
            [
                'company' => 'Zimou Group',
                'slug' => Str::slug('MyEcom'),
                'name' => 'MyEcom ERP & Installer',
                'header' => [
                    'en' => 'All-in-one ERP and onboarding platform for e-commerce operations.',
                    'fr' => 'Plateforme ERP tout-en-un avec système d’onboarding pour le e-commerce.',
                    'ar' => 'منصة ERP متكاملة مع نظام تهيئة وتشغيل لمتاجر التجارة الإلكترونية.',
                ],
                'description' => [
                    'en' => 'Comprehensive ERP system combined with automated onboarding and provisioning for e-commerce businesses.',
                    'fr' => 'Système ERP complet combiné à une plateforme d’onboarding et de provisioning automatisée.',
                    'ar' => 'نظام ERP متكامل مع منصة تهيئة وإنشاء تلقائي لمتاجر التجارة الإلكترونية.',
                ],
                'link' => 'https://myecom.dev/fr',
                'main_tags' => [
                    ProjectRole::BACKEND,
                    ProjectRole::FULLSTACK,
                ],
                'tags' => [
                    'ERP',
                    'SaaS',
                    'Multi-Tenant',
                    'Provisioning',
                    'Automation',
                    'API',
                    'Filament',
                    'Dashboard',
                    'E-commerce',
                ],
                'start' => '2025-03-01',
                'end' => now(),
                'is_featured' => true,
                'details' => [
                    'en' => "# MyEcom — Engineering a Scalable E-commerce ERP with Automated Provisioning

MyEcom is a full-scale SaaS platform designed to **centralize, automate, and scale e-commerce operations**, combining a modular ERP with an automated onboarding and provisioning system.

The platform unifies core business workflows — orders, inventory, logistics, CRM, and analytics — into a single ecosystem, while abstracting infrastructure complexity for end users.

## The Challenge

The system needed to balance **operational complexity and usability**:

- Supporting advanced ERP workflows across multiple domains
- Providing a seamless onboarding experience for non-technical users
- Designing a scalable multi-tenant architecture
- Automating provisioning of isolated, ready-to-use environments
- Maintaining performance and data isolation across tenants

This required tight control over both **system architecture and lifecycle automation**.

## The Approach

The platform was built as a **modular, API-first ERP**, backed by a multi-tenant architecture.

Core architectural components include:

- Multi-tenant system ensuring tenant isolation and scalability
- Modular ERP domains (orders, stock, CRM, logistics)
- Centralized API layer for integrations and extensibility
- Filament-based admin dashboard for internal and operational control

A key differentiator is the **automated installer and provisioning layer**, responsible for:

- Creating and configuring new tenant instances
- Initializing business data and settings
- Automating environment setup and deployment flows

From an architectural standpoint:

- Clear separation between core ERP logic and provisioning layer
- Emphasis on **automation, scalability, and maintainability**
- Designed to support horizontal scaling and future integrations
- Strong focus on developer experience and operational efficiency

## My Contribution

- Designed and implemented core backend architecture
- Built and maintained APIs for ERP modules and integrations
- Developed the Filament-based admin and management dashboards
- Engineered the installer system for automated provisioning
- Contributed to frontend features using TALL stack
- Optimized performance, tenant isolation, and scalability

## Outcome

MyEcom provides a unified platform that enables businesses to:

- Manage all e-commerce operations from a single interface
- Automate workflows across departments
- Launch new instances with minimal manual setup
- Scale efficiently within a multi-tenant environment

The combination of ERP + automated provisioning significantly reduces onboarding friction while supporting long-term growth.

## Takeaways

Building scalable SaaS platforms requires more than feature development.

This project reinforced the importance of **multi-tenant architecture, system automation, and separation of concerns** in delivering reliable, scalable, and easy-to-use enterprise systems.",

                    'fr' => "# MyEcom — Conception d’un ERP e-commerce scalable avec provisioning automatisé

MyEcom est une plateforme SaaS complète permettant de **centraliser et automatiser les opérations e-commerce**, combinée à un système d’onboarding automatisé.

## Le défi

- Gérer des workflows ERP complexes
- Simplifier l’onboarding pour les utilisateurs non techniques
- Assurer la scalabilité multi-tenant
- Automatiser la création des instances

## L’approche

- Architecture modulaire orientée API
- Système multi-tenant avec isolation
- Dashboard Filament pour la gestion
- Système d’installation automatisé

## Ma contribution

- Conception de l’architecture backend
- Développement des API
- Création des dashboards Filament
- Implémentation du système de provisioning
- Optimisation des performances

## Résultat

Une plateforme permettant de :

- Centraliser les opérations e-commerce
- Automatiser les processus métier
- Déployer rapidement de nouveaux environnements

## Conclusion

Ce projet démontre l’importance de **l’automatisation et de l’architecture multi-tenant** dans les plateformes SaaS.",

                    'ar' => "# MyEcom — بناء نظام ERP للتجارة الإلكترونية مع تهيئة تلقائية

MyEcom هي منصة SaaS متكاملة تهدف إلى **توحيد وأتمتة عمليات التجارة الإلكترونية** مع نظام إنشاء وتشغيل تلقائي.

## التحدي

- إدارة عمليات ERP معقدة
- تسهيل الاستخدام لغير التقنيين
- دعم بنية متعددة المستأجرين
- أتمتة إنشاء الأنظمة

## الحل

- بنية معيارية قائمة على API
- نظام Multi-tenant مع عزل البيانات
- لوحة تحكم باستخدام Filament
- نظام تثبيت وتوفير تلقائي

## مساهمتي

- تصميم وتطوير البنية الخلفية
- بناء واجهات API
- تطوير لوحات التحكم
- إنشاء نظام التهيئة التلقائية
- تحسين الأداء والتوسع

## النتيجة

منصة تساعد على:

- إدارة العمليات من مكان واحد
- أتمتة المهام
- إطلاق متاجر بسرعة

## الخلاصة

يوضح هذا المشروع أهمية **الأتمتة وبنية Multi-tenant** في بناء منصات SaaS قابلة للتوسع.",
                ],
            ],
            [
                'company' => 'Freelance',
                'slug' => Str::slug('Halal Audit'),
                'name' => 'Halal Audit',
                'header' => [
                    'en' => 'Modern landing page for halal certification and audit services.',
                    'fr' => 'Landing page moderne pour les services de certification et d’audit halal.',
                    'ar' => 'صفحة هبوط حديثة لخدمات التدقيق والشهادات الحلال.',
                ],
                'description' => [
                    'en' => 'Corporate landing page focused on clarity, trust, and conversion.',
                    'fr' => 'Site corporate axé sur la clarté, la confiance et la conversion.',
                    'ar' => 'موقع تعريفي يركز على الوضوح وبناء الثقة وتحقيق التحويل.',
                ],
                'link' => 'https://halal-audit.com/en/',
                'main_tags' => [
                    ProjectRole::FULLSTACK,
                ],
                'tags' => [
                    'Landing Page',
                    'Corporate Website',
                    'UI/UX',
                    'TALL Stack',
                    'SEO',
                    'Performance',
                ],
                'start' => '2022-06-01',
                'end' => '2022-07-01',
                'details' => [
                    'en' => "# Halal Audit — Engineering a High-Conversion Corporate Landing Page

Halal Audit is a corporate website designed to **present certification and audit services with clarity, credibility, and conversion in mind**, targeting businesses operating under international halal standards.

The project focused on transforming a complex, regulatory-driven service into a **clear and persuasive digital experience**.

## The Challenge

The primary challenge was not technical complexity, but **communication and trust-building**:

- Translating technical audit processes into accessible content
- Establishing credibility for a regulatory service
- Structuring information for both readability and conversion
- Supporting an international, multilingual audience

This required aligning **design, content, and performance** into a cohesive experience.

## The Approach

The platform was designed as a **conversion-oriented landing page**, with a strong emphasis on content hierarchy and user flow.

Key decisions included:

- Structuring content to progressively explain the concept of halal auditing
- Highlighting value propositions and trust signals (credibility, expertise)
- Designing clear call-to-action paths to guide user interaction
- Optimizing layout for readability across devices

From a technical perspective:

- Built using the **TALL stack** for maintainability and flexibility
- Focused on performance optimization (fast load times, lightweight assets)
- Implemented SEO-friendly structure (semantic HTML, metadata, content clarity)
- Ensured responsiveness across all screen sizes

## My Contribution

- Developed the full backend and frontend architecture
- Built reusable UI components using TALL stack
- Structured content flow for improved UX and conversion
- Optimized performance and responsiveness
- Implemented SEO best practices

## Outcome

The result is a professional and effective landing page that:

- Clearly communicates a complex regulatory service
- Builds trust through structured content and design
- Guides users toward conversion with minimal friction
- Performs efficiently across devices and networks

## Takeaways

This project demonstrates that simplicity requires precision.

High-performing landing pages rely on **clear messaging, structured content, and optimized performance** — not just visual design.",

                    'fr' => "# Halal Audit — Conception d’une landing page corporate à forte conversion

Halal Audit est un site conçu pour **présenter des services d’audit et de certification halal** de manière claire et professionnelle.

## Le défi

- Simplifier un contenu technique et réglementaire
- Construire la confiance auprès des entreprises
- Structurer le contenu pour la conversion
- Adapter le site à une audience internationale

## L’approche

- Design orienté conversion
- Hiérarchisation claire du contenu
- Mise en avant des propositions de valeur
- Optimisation SEO et performance

## Ma contribution

- Développement backend et frontend
- Création des composants UI
- Structuration UX du contenu
- Optimisation des performances

## Résultat

Une plateforme qui :

- Clarifie les services proposés
- Renforce la crédibilité
- Améliore la conversion

## Conclusion

Ce projet montre que **la clarté et la structure** sont essentielles pour des produits simples mais efficaces.",

                    'ar' => "# Halal Audit — تصميم صفحة هبوط عالية التحويل

Halal Audit هو موقع تعريفي تم تطويره لعرض **خدمات التدقيق والشهادات الحلال** بطريقة واضحة واحترافية.

## التحدي

- تبسيط محتوى تقني ومعقد
- بناء الثقة مع الشركات
- تنظيم المحتوى لتحقيق التحويل
- استهداف جمهور دولي

## الحل

- تصميم يركز على التحويل
- تنظيم واضح للمحتوى
- إبراز القيمة والخدمات
- تحسين الأداء و SEO

## مساهمتي

- تطوير الواجهة والخلفية
- بناء مكونات UI
- تحسين تجربة المستخدم
- تحسين الأداء

## النتيجة

موقع يحقق:

- وضوح في عرض الخدمات
- بناء الثقة
- تحسين معدل التحويل

## الخلاصة

هذا المشروع يوضح أن **الوضوح والتنظيم** هما الأساس في نجاح صفحات الهبوط.",
                ],
            ],
            /*
          |--------------------------------------------------------------------------
          | Packages
          |--------------------------------------------------------------------------
          */

            [
                'company' => 'Personal',
                'type' => ProjectType::PACKAGE,
                'slug' => Str::slug('Algeria Geo'),
                'name' => 'Algeria Geo',
                'header' => [
                    'en' => 'Standardized Algerian geographic dataset for Laravel applications.',
                    'fr' => 'Jeu de données géographiques algériennes standardisé pour les applications Laravel.',
                    'ar' => 'مجموعة بيانات جغرافية جزائرية موحدة لتطبيقات لارافيل.',
                ],
                'description' => [
                    'en' => 'Laravel package providing structured wilaya and commune data with a clean API for consistent location handling.',
                    'fr' => 'Package Laravel fournissant des données structurées des wilayas et communes avec une API propre pour une gestion cohérente des localisations.',
                    'ar' => 'حزمة لارافيل توفر بيانات منظمة للولايات والبلديات مع واجهة برمجية نظيفة لضمان توحيد التعامل مع المواقع.',
                ],
                'link' => 'https://github.com/KaziSTM/algeria-geo',
                'main_tags' => [
                    ProjectRole::BACKEND,
                ],
                'tags' => [
                    'Laravel Package',
                    'Geolocation',
                    'Data Modeling',
                    'API',
                ],
                'details' => [
                    'en' => "# Algeria Geo — Standardizing Location Data in Laravel

Algeria Geo is a Laravel package designed to provide a **reliable, normalized, and developer-friendly geographic dataset** for Algeria, covering wilayas and communes.

In many applications, handling location data becomes error-prone due to inconsistent naming, formatting, or duplication. This package solves that by offering a **single source of truth** for Algerian geographic data.

## The Challenge

Managing geographic data in real-world applications often leads to:

- Inconsistent naming conventions (Arabic / French variations)
- Duplicate or mismatched location entries
- Lack of structured relationships between wilayas and communes
- Difficulty integrating location data across services (delivery, billing, analytics)

These issues directly impact data integrity and system reliability.

## The Approach

The package was designed with a focus on **data normalization and developer experience**.

It provides:
- A structured dataset of all Algerian wilayas and communes
- Clear relationships between entities
- A clean, expressive API for querying and retrieving location data
- Consistent formatting to eliminate ambiguity

From an architectural perspective:
- The dataset is optimized for fast lookups
- The API is designed to integrate seamlessly with Laravel applications
- The structure supports extensibility for future geographic layers or providers

## My Contribution

- Designed the full data structure and normalization strategy
- Built the package architecture and API layer
- Ensured consistency across multilingual naming formats
- Focused on developer ergonomics and ease of integration

## Outcome

The result is a lightweight and reliable package that:

- Eliminates inconsistencies in location handling
- Improves data integrity across applications
- Accelerates development of location-based features
- Provides a solid foundation for delivery, e-commerce, and SaaS systems

## Takeaways

This project highlights the importance of **data consistency as a core architectural concern**.

Even simple datasets can introduce complexity if not standardized properly. By treating data as a first-class citizen, you significantly improve system robustness and scalability.",

                    'fr' => "# Algeria Geo — Standardisation des données géographiques en Laravel

Algeria Geo est un package Laravel conçu pour fournir un **jeu de données géographiques algériennes fiable, normalisé et facile à utiliser**, couvrant les wilayas et les communes.

## Le défi

La gestion des données géographiques pose souvent plusieurs problèmes :

- Incohérences dans les noms (arabe / français)
- Données dupliquées ou incorrectes
- Relations non structurées entre wilayas et communes
- Difficulté d’intégration avec d'autres services

## L’approche

Le package propose :

- Une base de données structurée des wilayas et communes
- Des relations claires entre les entités
- Une API simple et expressive
- Un format cohérent pour éviter toute ambiguïté

## Ma contribution

- Conception du modèle de données
- Développement de l’architecture du package
- Normalisation des données multilingues
- Optimisation pour l’expérience développeur

## Résultat

Un package léger qui :

- Améliore la cohérence des données
- Simplifie le développement
- Fournit une base solide pour les systèmes basés sur la localisation

## Conclusion

Ce projet démontre que la **qualité des données est essentielle** pour construire des applications fiables et scalables.",

                    'ar' => "# Algeria Geo — توحيد البيانات الجغرافية في لارافيل

Algeria Geo هي حزمة Laravel تهدف إلى توفير **بيانات جغرافية جزائرية موحدة، دقيقة وسهلة الاستخدام** تشمل الولايات والبلديات.

## التحدي

إدارة بيانات المواقع غالبًا ما تواجه مشاكل مثل:

- اختلاف أسماء المناطق (العربية / الفرنسية)
- تكرار البيانات أو عدم دقتها
- غياب العلاقات الواضحة بين الولايات والبلديات
- صعوبة التكامل مع الأنظمة الأخرى

## الحل

توفر الحزمة:

- قاعدة بيانات منظمة للولايات والبلديات
- علاقات واضحة بين الكيانات
- واجهة برمجية بسيطة وسهلة الاستخدام
- تنسيق موحد للبيانات

## مساهمتي

- تصميم هيكلة البيانات
- تطوير بنية الحزمة وواجهة البرمجة
- توحيد البيانات متعددة اللغات
- تحسين تجربة المطور

## النتيجة

حزمة خفيفة تساعد على:

- تحسين جودة البيانات
- تسريع عملية التطوير
- بناء أنظمة تعتمد على المواقع بشكل موثوق

## الخلاصة

هذا المشروع يبرز أهمية **توحيد البيانات** كعنصر أساسي في بناء تطبيقات قوية وقابلة للتوسع.",
                ],
                'is_featured' => false,
            ],

            [
                'company' => 'Personal',
                'type' => ProjectType::PACKAGE,
                'slug' => Str::slug('Subscriptions Package'),
                'name' => 'Laravel Subscriptions',
                'header' => 'Flexible subscription engine with feature-based limitations.',
                'description' => 'Custom Laravel subscription system supporting modular features, limitations, and scalable SaaS billing logic.',
                'link' => 'https://github.com/KaziSTM/subscriptions',
                'main_tags' => [
                    ProjectRole::BACKEND,
                ],
                'is_active' => false,
                'tags' => [
                    'Laravel Package',
                    'SaaS',
                    'Billing',
                    'Architecture',
                ],
                'details' => "# Laravel Subscriptions — Modular SaaS Billing Engine

A flexible subscription system built for SaaS applications, focusing on feature-based limitations and scalable architecture.

Designed to support complex billing logic while remaining extensible and developer-friendly.",
                'is_featured' => true,
            ],

            /*
            |--------------------------------------------------------------------------
            | Platform (Vargo / DzShip)
            |--------------------------------------------------------------------------
            */

            [
                'company' => 'Personal',
                'type' => ProjectType::PROJECT,
                'slug' => Str::slug('Vargo'),
                'name' => 'Vargo',
                'header' => [
                    'en' => 'Unified delivery integration platform for Algerian logistics providers.',
                    'fr' => 'Plateforme unifiée d’intégration des services de livraison en Algérie.',
                    'ar' => 'منصة موحدة لدمج خدمات التوصيل في الجزائر.',
                ],
                'description' => [
                    'en' => 'Platform and SDK ecosystem enabling integration with multiple delivery providers through a unified API.',
                    'fr' => 'Plateforme et SDK permettant d’intégrer plusieurs services de livraison عبر une API unifiée.',
                    'ar' => 'منصة وSDK لدمج عدة مزودي توصيل عبر واجهة API موحدة.',
                ],
                'link' => null,
                'main_tags' => [
                    ProjectRole::BACKEND,
                    ProjectRole::FULLSTACK,
                ],
                'tags' => [
                    'SDK',
                    'API',
                    'Logistics',
                    'Integration',
                    'Laravel Package',
                ],
                'is_in_progress' => true,
                'details' => [
                    'en' => "# Vargo — Engineering a Unified Delivery Integration Layer

Vargo is a platform designed to **standardize and simplify integrations with Algerian delivery providers**, offering a unified API and SDK ecosystem for developers.

Instead of handling each provider separately, Vargo abstracts their differences behind a consistent and developer-friendly interface.

## The Challenge

Delivery providers often expose:

- Inconsistent APIs and data formats
- Different authentication and request flows
- Varying capabilities and constraints
- Poor or incomplete documentation

This creates high integration overhead and tight coupling between applications and providers.

## The Approach

The platform is built around a **driver-based architecture**, where each provider is implemented as an isolated driver adhering to a shared contract.

Core design principles include:

- Unified API surface across all providers
- Normalized request and response structures
- Extensible driver system for adding new providers
- Clear separation between core logic and provider-specific implementations

An SDK layer sits on top, providing:

- Consistent developer experience
- Simplified integration workflow
- Abstraction of low-level API details
- Reusable components for rapid adoption

From an architectural perspective:

- Emphasis on **abstraction, contracts, and extensibility**
- Designed for scalability as new providers are added
- Focus on maintainability and clean API design

## My Contribution

- Designed the overall system architecture
- Implemented the driver-based integration model
- Built the unified API layer
- Developed the SDK for developer consumption
- Standardized data structures and contracts

## Outcome

Vargo enables developers to:

- Integrate multiple delivery providers through a single interface
- Reduce integration complexity and development time
- Switch or combine providers without major refactoring
- Build scalable logistics features with minimal overhead

## Takeaways

This project emphasizes the importance of **abstraction and API design**.

A well-designed integration layer can hide complexity while providing flexibility, scalability, and a significantly better developer experience.",

                    'fr' => "# Vargo — Plateforme d’intégration unifiée des services de livraison

Vargo est une plateforme permettant de **standardiser les intégrations avec les transporteurs** via une API unique.

## Le défi

- APIs hétérogènes
- Différences dans les flux d’authentification
- Complexité d’intégration

## L’approche

- Architecture basée sur des drivers
- API unifiée
- Normalisation des données
- SDK pour simplifier l’intégration

## Ma contribution

- Conception de l’architecture
- Implémentation des drivers
- Développement de l’API et du SDK

## Résultat

- Intégration simplifiée
- Réduction de la complexité
- Meilleure scalabilité

## Conclusion

Ce projet met en avant l’importance de **l’abstraction et du design d’API**.",

                    'ar' => "# Vargo — منصة موحدة لدمج خدمات التوصيل

Vargo هي منصة تهدف إلى **توحيد و تبسيط دمج خدمات التوصيل** عبر API موحدة.

## التحدي

- اختلاف APIs بين المزودين
- تعقيد التكامل
- نقص التوحيد في البيانات

## الحل

- نظام يعتمد على Drivers
- واجهة API موحدة
- توحيد البيانات
- SDK لتسهيل الاستخدام

## مساهمتي

- تصميم البنية العامة
- تطوير نظام Drivers
- بناء API و SDK

## النتيجة

- تسهيل الدمج
- تقليل التعقيد
- قابلية التوسع

## الخلاصة

هذا المشروع يبرز أهمية **تصميم APIs والطبقات الوسيطة**.",
                ],
            ],

        ];
    }

    private function syncMedia(Project $project): void
    {
        $slug = $project->slug;

        $logoPath = public_path("assets/images/projects/{$slug}-logo.png");
        $main = public_path("assets/images/projects/{$slug}-main.png");


        if (is_file($logoPath) && $project->getFirstMedia('logo')?->file_name !== basename($logoPath)) {
            $project->clearMediaCollection('logo');
            $project->addMedia($logoPath)->preservingOriginal()->toMediaCollection('logo');
        }

        if (is_file($logoPath) && $project->getFirstMedia('main')?->file_name !== basename($logoPath)) {
            $project->clearMediaCollection('main');
            $project->addMedia($logoPath)->preservingOriginal()->toMediaCollection('main');
        }

        $imagePaths = collect(range(1, 9))
            ->map(fn(int $index) => public_path("assets/images/projects/{$slug}-{$index}.jpg"))
            ->filter(fn($path) => is_file($path))
            ->values();

        if ($imagePaths->isEmpty()) {
            return;
        }

        $currentImages = $project->getMedia('images')->pluck('file_name');
        $expectedImages = $imagePaths->map(fn($path) => basename($path));

        if ($currentImages->values()->all() === $expectedImages->all()) {
            return;
        }

        $project->clearMediaCollection('images');

        foreach ($imagePaths as $path) {
            $project->addMedia($path)->preservingOriginal()->toMediaCollection('images');
        }
    }
}
