<?php

namespace App\Actions\Data\Projects;

use App\Enums\ProjectRole;
use Illuminate\Support\Str;

final readonly class CompaniesProjects
{


    public static function get(): array
    {
        return [
            ...self::getTechflyProjects(),
            self::getZimouProjects(),
        ];
    }

    private static function getTechflyProjects(): array
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
                    'en' => 'Enterprise AI platform integrating LLMs, custom RAG pipelines, vector search, and automated business workflow agents.',
                    'fr' => 'Plateforme IA entreprise intégrant des modèles LLM, des pipelines RAG sur mesure et des agents d’automatisation métier.',
                    'ar' => 'منصة ذكاء اصطناعي للمؤسسات تدمج نماذج اللغة الكبيرة وأنظمة RAG المخصصة وكلاء أتمتة العمليات.',
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
                    'en' => '# Kheops AI — Engineering an Enterprise AI Automation Platform

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

It requires **robust backend architecture, high-quality data pipelines, and strong retrieval mechanisms** to deliver reliable and scalable results.',

                    'fr' => '# Kheops AI — Conception d’une plateforme IA entreprise

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

Un système IA performant repose avant tout sur **l’architecture et la gestion des données**.',

                    'ar' => '# Kheops AI — بناء منصة ذكاء اصطناعي للمؤسسات

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

نجاح أنظمة الذكاء الاصطناعي يعتمد على **جودة البنية والبيانات** وليس فقط على النماذج.',
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
                    'en' => 'Advanced capacity-driven booking engine designed for shared event spaces with real-time concurrency control and atomic validations.',
                    'fr' => 'Moteur de réservation basé sur la capacité pour espaces partagés avec contrôle de concurrence en temps réel et validations atomiques.',
                    'ar' => 'محرك حجز متقدم يعتمد على إدارة السعة الديناميكية للمساحات المشتركة مع تحكم كامل في التزامن في الوقت الفعلي.',
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
                    'en' => '# GCCO Reservation Platform — Engineering a Capacity-Driven Booking System

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

This project reinforced the importance of **concurrency control, transactional design, and precise business rule modeling** in building reliable, real-world systems.',

                    'fr' => '# Plateforme GCCO — Conception d’un système de réservation basé sur la capacité

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

Ce projet met en évidence l’importance de la **gestion de la concurrence et des transactions** dans les systèmes de réservation.',

                    'ar' => '# منصة GCCO — نظام حجز يعتمد على السعة

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

هذا المشروع يوضح أن أنظمة الحجز تتطلب **تحكم دقيق في التزامن والمعاملات** لضمان الموثوقية.',
                ],
            ],
            [
                'company' => 'Techfly',
                'slug' => Str::slug('GED'),
                'name' => 'GED',
                'header' => [
                    'en' => 'Multi-company electronic document management system.',
                    'fr' => 'Système de gestion électronique des documents multi-entreprises.',
                    'ar' => 'نظام متعدد الشركات لإدارة الوثائق إلكترونيًا.',
                ],
                'description' => [
                    'en' => 'Enterprise electronic document management system built with Laravel and Filament, designed to centralize document workflows across multiple subsidiary companies.',
                    'fr' => 'Système de gestion électronique des documents développé avec Laravel et Filament, conçu pour centraliser les workflows documentaires de plusieurs filiales.',
                    'ar' => 'نظام مؤسسي لإدارة الوثائق إلكترونيًا مبني باستخدام Laravel وFilament، مصمم لمركزة سير عمل الوثائق عبر عدة شركات فرعية.',
                ],
                'link' => null,
                'main_tags' => [
                    ProjectRole::BACKEND,
                    ProjectRole::FULLSTACK,
                ],
                'is_featured' => false,
                'tags' => ['Laravel', 'Filament', 'GED', 'Document Management', 'Multi-Company'],
                'start' => '2024-08-01',
                'end' => '2024-10-01',
                'details' => [
                    'en' => '# GED — Engineering a Multi-Company Document Management System

GED (Gestion Électronique des Documents) is an enterprise document management platform designed to centralize and manage documents across **multiple subsidiary companies** within a single application.

The platform provides each company with its own operational environment while maintaining centralized administration, access control, and document workflows.

## The Challenge

Managing documents across multiple companies requires strong organizational and access-control mechanisms.

The system needed to support:

- Multiple subsidiary companies within the same platform
- Company-level data isolation
- Role-based access and permissions
- Centralized document management
- Structured document workflows
- Administrative oversight across multiple entities

## The Approach

The platform was built with **Laravel and Filament**, using a multi-company architecture to allow different subsidiaries to operate within the same application.

Key components include:

- Multi-company and subsidiary management
- Document storage and organization
- Document categorization
- Role and permission management
- Company-level access control
- Document workflows and lifecycle management
- Centralized administration through Filament

Filament provided the foundation for the internal administration interface, allowing complex business operations to be managed through a structured and maintainable dashboard.

## My Contribution

- Designed and implemented the backend architecture
- Developed the multi-company architecture
- Built the document management system
- Implemented roles, permissions, and access control
- Developed Filament resources and administrative interfaces
- Implemented company-level data isolation
- Developed document workflows and business logic
- Contributed to the frontend and internal management interfaces

## Outcome

GED provides a centralized document management environment where multiple subsidiary companies can operate independently while remaining within the same platform.

The system enables organizations to:

- Centralize their document management
- Maintain separation between subsidiaries
- Control access through roles and permissions
- Standardize document workflows
- Manage multiple companies from a centralized administration interface

## Takeaways

Building a multi-company document management system requires careful consideration of **data isolation, authorization, document lifecycle management, and workflow architecture**.

This project strengthened my experience in designing enterprise applications that support multiple organizational entities within a single scalable platform.',

                    'fr' => '# GED — Conception d’un système de gestion électronique des documents multi-entreprises

La GED (Gestion Électronique des Documents) est une plateforme documentaire d’entreprise conçue pour centraliser et gérer les documents de **plusieurs sociétés filiales** au sein d’une même application.

La plateforme permet à chaque société de disposer de son propre environnement opérationnel tout en conservant une administration centralisée, une gestion fine des accès et des workflows documentaires.

## Le défi

La gestion documentaire dans un environnement multi-entreprises nécessite une architecture capable de garantir la séparation des données tout en conservant une administration commune.

Le système devait notamment gérer :

- Plusieurs sociétés filiales
- L’isolation des données par société
- Les rôles et permissions
- La gestion centralisée des documents
- Les workflows documentaires
- La supervision globale des différentes entités

## L’approche

La plateforme a été développée avec **Laravel et Filament**, autour d’une architecture multi-entreprises permettant à plusieurs filiales d’utiliser la même application.

Les principales fonctionnalités comprennent :

- Gestion des sociétés et filiales
- Stockage et organisation des documents
- Catégorisation documentaire
- Gestion des rôles et permissions
- Contrôle des accès par société
- Gestion du cycle de vie des documents
- Administration centralisée avec Filament

Filament constitue la base de l’interface d’administration et permet de gérer les différentes opérations métier à travers un dashboard structuré.

## Ma contribution

- Conception et développement de l’architecture backend
- Mise en place de l’architecture multi-entreprises
- Développement du système de gestion documentaire
- Implémentation des rôles, permissions et contrôles d’accès
- Développement des ressources et interfaces Filament
- Mise en place de l’isolation des données par société
- Développement des workflows documentaires et de la logique métier
- Contribution aux interfaces frontend et d’administration

## Résultat

La GED fournit un environnement centralisé permettant à plusieurs sociétés filiales de travailler indépendamment tout en utilisant la même plateforme.

Le système permet notamment de :

- Centraliser la gestion documentaire
- Séparer les données entre les filiales
- Contrôler les accès avec des rôles et permissions
- Standardiser les workflows documentaires
- Administrer plusieurs sociétés depuis une interface centralisée

## Conclusion

La conception d’une GED multi-entreprises nécessite une attention particulière à **l’isolation des données, l’autorisation, la gestion du cycle de vie documentaire et l’architecture des workflows**.',

                    'ar' => '# GED — بناء نظام متعدد الشركات لإدارة الوثائق إلكترونيًا

GED (Gestion Électronique des Documents) هي منصة مؤسسية لإدارة الوثائق، تم تصميمها لمركزة وإدارة وثائق **عدة شركات فرعية** ضمن تطبيق واحد.

تتيح المنصة لكل شركة العمل ضمن بيئتها الخاصة، مع الحفاظ على إدارة مركزية وصلاحيات دقيقة وسير عمل موحد للوثائق.

## التحدي

تتطلب إدارة الوثائق في بيئة متعددة الشركات بنية قوية تضمن فصل البيانات مع الحفاظ على إدارة مركزية.

كان النظام بحاجة إلى دعم:

- عدة شركات فرعية
- عزل البيانات حسب الشركة
- إدارة الأدوار والصلاحيات
- الإدارة المركزية للوثائق
- سير العمل الخاص بالوثائق
- الإشراف على مختلف الشركات من خلال إدارة موحدة

## الحل

تم تطوير المنصة باستخدام **Laravel وFilament**، مع بنية متعددة الشركات تسمح لعدة شركات فرعية باستخدام نفس التطبيق.

تشمل المكونات الرئيسية:

- إدارة الشركات والفروع
- تخزين وتنظيم الوثائق
- تصنيف الوثائق
- إدارة الأدوار والصلاحيات
- التحكم في الوصول حسب الشركة
- إدارة دورة حياة الوثائق
- الإدارة المركزية باستخدام Filament

تم استخدام Filament كأساس لواجهة الإدارة، مما سمح ببناء لوحة تحكم منظمة لإدارة العمليات المختلفة.

## مساهمتي

- تصميم وتطوير البنية الخلفية
- بناء البنية متعددة الشركات
- تطوير نظام إدارة الوثائق
- تنفيذ الأدوار والصلاحيات والتحكم في الوصول
- تطوير موارد وواجهات Filament
- تطبيق عزل البيانات حسب الشركة
- تطوير سير عمل الوثائق ومنطق الأعمال
- المساهمة في واجهات المستخدم والإدارة

## النتيجة

توفر GED بيئة مركزية لإدارة الوثائق، حيث يمكن لعدة شركات فرعية العمل بشكل مستقل ضمن نفس المنصة مع الحفاظ على فصل البيانات والصلاحيات.

يسمح النظام بـ:

- مركزة إدارة الوثائق
- فصل بيانات الشركات الفرعية
- التحكم في الوصول باستخدام الأدوار والصلاحيات
- توحيد سير العمل الخاص بالوثائق
- إدارة عدة شركات من خلال واجهة مركزية

## الخلاصة

ركز المشروع على **عزل البيانات، إدارة الصلاحيات، إدارة دورة حياة الوثائق، وتصميم سير العمل** لبناء نظام مؤسسي قابل للتوسع.',
                ],
            ],

            [
                'company' => 'Techfly',
                'slug' => Str::slug('DZignerd'),
                'name' => 'DZignerd Marketplace',
                'header' => [
                    'en' => 'Multi-vendor marketplace for Algerian-made decoration and artisan products.',
                    'fr' => 'Marketplace multi-vendeurs dédiée aux produits de décoration et d’artisanat algériens.',
                    'ar' => 'منصة تجارة إلكترونية متعددة البائعين للمنتجات الجزائرية في مجال الديكور والحرف اليدوية.',
                ],
                'description' => [
                    'en' => 'E-commerce marketplace connecting Algerian artisans and independent designers with buyers through a scalable Laravel API and Flutter applications.',
                    'fr' => 'Marketplace e-commerce mettant en relation artisans et créateurs algériens avec les acheteurs grâce à une API Laravel évolutive et des applications Flutter.',
                    'ar' => 'منصة تجارة إلكترونية تربط الحرفيين والمصممين الجزائريين بالمشترين من خلال واجهة API مبنية على Laravel وتطبيقات Flutter قابلة للتوسع.',
                ],
                'link' => 'https://dzignerd.com',
                'main_tags' => [
                    ProjectRole::BACKEND,
                    ProjectRole::FULLSTACK,
                ],
                'is_featured' => false,
                'tags' => ['E-Commerce', 'Marketplace', 'Multi Vendor', 'API'],
                'start' => '2024-09-01',
                'end' => '2025-01-01',
                'details' => [
                    'en' => '# DZignerd — Engineering a Multi-Vendor Marketplace for Algerian Artisans

DZignerd is an e-commerce marketplace designed specifically for **Algerian-made decoration and artisan products**, connecting independent designers and artisans directly with buyers through web and mobile applications.

The platform combines a visually-driven shopping experience with a robust backend capable of handling the complexity of a multi-vendor marketplace.

## The Challenge

Unlike a traditional e-commerce platform, DZignerd needed to support multiple independent vendors operating within the same marketplace.

The main challenges included:

- Managing products and inventory across multiple vendors
- Supporting detailed product categorization for different artisan disciplines
- Handling multi-vendor orders and order splitting
- Integrating local payment methods securely
- Calculating vendor commissions and marketplace fees
- Providing vendor profiles focused on the artisan and their story
- Maintaining a consistent experience across web and mobile clients

## The Approach

The platform was built around a **Laravel API-first backend**, providing the business logic and data layer consumed by the Flutter mobile application and web interface.

Key components include:

- Multi-vendor product and inventory management
- Structured product categorization for decoration and artisan products
- Vendor profiles and storefront management
- Multi-vendor order processing and lifecycle management
- Local payment gateway integration
- Automated commission calculation
- Secure API authentication and authorization
- Dashboard functionality for vendors and users

The architecture was designed to keep marketplace logic centralized in the backend while allowing different client applications to consume the same API.

## My Contribution

- Designed and implemented core backend architecture
- Developed the marketplace business logic
- Built product, vendor, inventory, and order management functionality
- Implemented the multi-vendor order flow
- Integrated payment and commission logic
- Developed APIs for web and mobile clients
- Implemented parts of the frontend, particularly user and vendor dashboards
- Contributed to the overall application architecture

## Outcome

DZignerd provides a structured digital marketplace for the local creative economy, enabling:

- Independent artisans to sell their products online
- Buyers to discover and purchase Algerian-made products
- Vendors to manage products, inventory, and orders
- The platform to handle multi-vendor transactions and commissions
- Web and mobile applications to operate on a shared backend

## Takeaways

Multi-vendor commerce introduces significantly more complexity than traditional e-commerce.

This project reinforced the importance of **domain modeling, order lifecycle management, inventory consistency, payment handling, and centralized business logic** when building scalable marketplace platforms.',

                    'fr' => '# DZignerd — Conception d’une marketplace dédiée à l’artisanat algérien

DZignerd est une marketplace e-commerce dédiée aux **produits de décoration et d’artisanat fabriqués en Algérie**, mettant en relation des créateurs et artisans indépendants avec les acheteurs via des applications web et mobiles.

## Le défi

Contrairement à une boutique e-commerce classique, DZignerd devait permettre à plusieurs vendeurs indépendants de gérer leurs activités au sein d’une même plateforme.

Les principaux défis étaient :

- Gestion des produits et des stocks de plusieurs vendeurs
- Catégorisation détaillée des produits artisanaux
- Gestion des commandes multi-vendeurs
- Intégration sécurisée des moyens de paiement locaux
- Calcul des commissions de la marketplace
- Gestion des profils vendeurs et de leur identité artisanale
- Cohérence entre les applications web et mobiles

## L’approche

La plateforme repose sur une **API Laravel centralisée**, utilisée par l’application Flutter ainsi que par l’interface web.

Les principales fonctionnalités comprennent :

- Gestion des produits et des stocks multi-vendeurs
- Catégorisation des produits
- Gestion des profils et boutiques vendeurs
- Gestion du cycle de vie des commandes
- Traitement des commandes multi-vendeurs
- Intégration des paiements locaux
- Calcul automatique des commissions
- Authentification et autorisation via API
- Tableaux de bord utilisateurs et vendeurs

L’architecture permet de centraliser la logique métier dans le backend tout en permettant à plusieurs interfaces de consommer la même API.

## Ma contribution

- Conception et développement de l’architecture backend
- Développement de la logique métier de la marketplace
- Gestion des produits, vendeurs, stocks et commandes
- Mise en place du processus de commande multi-vendeurs
- Intégration de la logique de paiement et de commissions
- Développement des API pour les applications web et mobiles
- Développement de plusieurs parties du frontend, notamment les tableaux de bord
- Contribution à l’architecture globale de l’application

## Résultat

DZignerd fournit une marketplace structurée permettant :

- Aux artisans de vendre leurs créations en ligne
- Aux acheteurs de découvrir des produits algériens
- Aux vendeurs de gérer leurs produits, stocks et commandes
- À la plateforme de gérer les transactions multi-vendeurs et les commissions
- Aux applications web et mobiles de fonctionner sur un backend commun

## Conclusion

Le développement d’une marketplace multi-vendeurs nécessite une gestion plus complexe qu’un simple site e-commerce.

Ce projet a notamment mis l’accent sur **la modélisation métier, la gestion du cycle de vie des commandes, la cohérence des stocks, les paiements et la centralisation de la logique métier**.',

                    'ar' => '# DZignerd — بناء منصة تجارة إلكترونية للحرفيين الجزائريين

DZignerd هي منصة تجارة إلكترونية متخصصة في **منتجات الديكور والحرف اليدوية المصنوعة في الجزائر**، تربط بين المصممين والحرفيين المستقلين والمشترين من خلال تطبيقات الويب والهاتف المحمول.

## التحدي

على عكس المتاجر الإلكترونية التقليدية، كان من الضروري أن تدعم المنصة عدة بائعين مستقلين داخل نفس النظام.

شملت التحديات الرئيسية:

- إدارة المنتجات والمخزون لعدة بائعين
- تنظيم المنتجات ضمن تصنيفات متخصصة
- إدارة الطلبات التي تضم منتجات من عدة بائعين
- دمج وسائل الدفع المحلية بشكل آمن
- حساب عمولات المنصة والبائعين
- إنشاء ملفات تعريف متقدمة للحرفيين والبائعين
- الحفاظ على تجربة موحدة بين الويب وتطبيق الهاتف

## الحل

تم بناء المنصة حول **واجهة API مركزية باستخدام Laravel**، تُستخدم من طرف تطبيق Flutter وواجهة الويب.

تشمل المكونات الرئيسية:

- إدارة المنتجات والمخزون متعدد البائعين
- تصنيف المنتجات
- إدارة ملفات ومتاجر البائعين
- إدارة دورة حياة الطلبات
- معالجة الطلبات متعددة البائعين
- دمج وسائل الدفع المحلية
- الحساب التلقائي للعمولات
- المصادقة والصلاحيات عبر API
- لوحات تحكم المستخدمين والبائعين

تم تصميم البنية بحيث تكون منطق الأعمال مركزيًا في الـ backend، مع إمكانية استخدام نفس الـ API من عدة واجهات.

## مساهمتي

- تصميم وتطوير البنية الخلفية
- تطوير منطق الأعمال الخاص بالمنصة
- بناء أنظمة المنتجات والبائعين والمخزون والطلبات
- تطوير نظام الطلبات متعدد البائعين
- تنفيذ منطق الدفع وحساب العمولات
- تطوير واجهات API لتطبيقات الويب والهاتف
- تطوير أجزاء من الواجهة الأمامية، خصوصًا لوحات التحكم
- المساهمة في البنية العامة للتطبيق

## النتيجة

توفر DZignerd منصة رقمية متكاملة تتيح:

- للحرفيين بيع منتجاتهم عبر الإنترنت
- للمشترين اكتشاف المنتجات الجزائرية وشرائها
- للبائعين إدارة المنتجات والمخزون والطلبات
- للمنصة إدارة المعاملات والعمولات متعددة البائعين
- لتطبيقات الويب والهاتف العمل على نفس البنية الخلفية

## الخلاصة

تتطلب منصات التجارة متعددة البائعين مستوى أعلى من التعقيد مقارنة بالمتاجر الإلكترونية التقليدية.

ركز هذا المشروع على **نمذجة منطق الأعمال، إدارة دورة حياة الطلبات، الحفاظ على اتساق المخزون، معالجة المدفوعات، ومركزية منطق التطبيق**.',
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
                    'en' => 'Healthcare AI platform transforming unstructured personal interviews and audio recordings into structured digital life stories.',
                    'fr' => 'Plateforme IA de santé transformant les récits oraux et enregistrements audio en histoires de vie numériques structurées.',
                    'ar' => 'منصة ذكاء اصطناعي لمؤسسات الرعاية تحول التسجيلات والمقابلة الشفهية إلى قصص حياة رقمية منظمة ومفيدة.',
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
                    'en' => '# PASSMEMO — Structuring Human Narratives Through Data and AI

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

This project reinforced that **flexible data modeling, pipeline design, and separation of concerns** are critical when transforming unstructured inputs into scalable, structured systems.',

                    'fr' => '# PASSMEMO — Structuration des récits de vie avec l’IA

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

Ce projet montre l’importance de la **modélisation flexible des données** et des pipelines dans les systèmes orientés données.',

                    'ar' => '# PASSMEMO — تنظيم قصص الحياة باستخدام الذكاء الاصطناعي

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

هذا المشروع يبرز أهمية **المرونة في تصميم البيانات** عند التعامل مع معلومات بشرية غير منظمة.',
                ],
            ],
            [
                'company' => 'Techfly',
                'slug' => Str::slug('Carloue'),
                'name' => 'Carloue',
                'header' => [
                    'en' => 'Peer-to-peer car rental marketplace.',
                    'fr' => 'Marketplace de location de voitures entre particuliers.',
                    'ar' => 'منصة لتأجير السيارات بين الأفراد.',
                ],
                'description' => [
                    'en' => 'Peer-to-peer car rental platform connecting private vehicle owners with renters through a Laravel API, with booking, availability, identity verification, contracts, and secure payment workflows.',
                    'fr' => 'Plateforme de location de voitures entre particuliers mettant en relation propriétaires et locataires via une API Laravel avec gestion des réservations, disponibilités, vérification d’identité, contrats et paiements sécurisés.',
                    'ar' => 'منصة لتأجير السيارات بين الأفراد تربط أصحاب المركبات بالمستأجرين عبر واجهة API مبنية باستخدام Laravel، مع إدارة الحجوزات والتوفر والتحقق من الهوية والعقود والمدفوعات الآمنة.',
                ],
                'link' => null,
                'main_tags' => [
                    ProjectRole::BACKEND,
                    ProjectRole::FULLSTACK,
                ],
                'is_featured' => false,
                'tags' => ['Car Rental', 'Marketplace', 'Laravel', 'API', 'Booking', 'Flutter'],
                'start' => '2023-01-01',
                'end' => '2023-12-01',
                'details' => [
                    'en' => '# Carloue — Engineering a Peer-to-Peer Car Rental Marketplace

Carloue is a **peer-to-peer car rental marketplace** designed to connect private vehicle owners with individuals looking to rent cars.

The platform provides the infrastructure required to manage the complete rental lifecycle, from vehicle listing and availability to booking, identity verification, contracts, and payment processing.

## The Challenge

A peer-to-peer rental platform requires significantly more than a standard booking system.

The backend needed to handle:

- Multiple user roles including owners and renters
- Detailed vehicle listings and specifications
- Dynamic availability calendars
- Geo-location based vehicle discovery
- Booking and rental lifecycle management
- Identity verification
- Digital rental contracts
- Secure financial transactions
- Protection against double-booking
- Communication between the different actors involved in a rental

The system also needed to provide a reliable API consumed by the Flutter mobile application.

## The Approach

The platform was built around a **Laravel backend and API-first architecture**, with the web back office handling the core management operations and the Flutter application consuming the APIs.

Key components include:

- Owner and renter role management
- Vehicle listing and media management
- Availability calendar and scheduling
- Geo-location search and filtering
- Booking workflow and validation
- Identity verification
- Digital contract management
- Payment processing
- Rental lifecycle management
- Administrative and operational dashboards

Strong emphasis was placed on keeping booking and availability logic consistent to prevent conflicting reservations across independently managed vehicles.

## My Contribution

I was responsible for the **backend, API, business logic, and web back office** of the platform.

My work included:

- Designed and implemented the backend architecture
- Developed the complete business logic
- Built the Laravel API consumed by the mobile application
- Implemented owner and renter workflows
- Developed vehicle listing and availability management
- Built the booking and reservation logic
- Implemented identity verification workflows
- Developed digital contract functionality
- Implemented payment-related business logic
- Developed the web back office and management interfaces

The Flutter mobile application was developed by other developers, while I was responsible for the backend ecosystem and the web-based management interface.

## Outcome

Carloue provides a complete infrastructure for peer-to-peer vehicle rental, allowing:

- Owners to publish and manage their vehicles
- Renters to discover and book available cars
- The platform to manage availability and prevent conflicts
- Users to go through identity and contract workflows
- Transactions to be handled through a centralized backend
- Mobile applications to consume a consistent and secure API

## Takeaways

Peer-to-peer rental platforms combine several complex domains: **marketplace logic, scheduling, identity verification, contracts, payments, and multi-role authorization**.

This project strengthened my experience in designing API-driven Laravel applications with complex business workflows and transaction lifecycles.',

                    'fr' => '# Carloue — Conception d’une marketplace de location de voitures entre particuliers

Carloue est une **marketplace de location de voitures entre particuliers** permettant de mettre en relation des propriétaires de véhicules avec des personnes souhaitant louer une voiture.

La plateforme gère l’ensemble du cycle de location, de la publication du véhicule jusqu’à la réservation, la vérification d’identité, la signature des contrats et les paiements.

## Le défi

Une plateforme de location entre particuliers nécessite une logique métier plus complexe qu’un simple système de réservation.

Le backend devait notamment gérer :

- Plusieurs rôles utilisateur : propriétaire et locataire
- Les informations détaillées des véhicules
- Les calendriers de disponibilité
- La recherche géolocalisée
- Le processus de réservation
- La vérification d’identité
- Les contrats de location numériques
- Les transactions financières
- La prévention des doubles réservations
- Les différents acteurs du processus de location

## L’approche

La plateforme repose sur une **architecture Laravel orientée API**, avec un back office web chargé de la gestion opérationnelle et une application Flutter consommant les APIs.

Les principales fonctionnalités comprennent :

- Gestion des rôles propriétaires et locataires
- Gestion des véhicules et de leurs médias
- Calendrier de disponibilité
- Recherche et filtres géolocalisés
- Workflow de réservation
- Vérification d’identité
- Gestion des contrats numériques
- Gestion des paiements
- Gestion du cycle de vie des locations
- Interfaces d’administration et de gestion

Une attention particulière a été portée à la cohérence des disponibilités et des réservations afin d’éviter les conflits.

## Ma contribution

J’étais responsable du **backend, des APIs, de la logique métier et du back office web**.

Mes principales contributions :

- Conception et développement de l’architecture backend
- Développement de l’ensemble de la logique métier
- Création de l’API Laravel consommée par l’application mobile
- Implémentation des workflows propriétaires et locataires
- Gestion des véhicules et de leurs disponibilités
- Développement de la logique de réservation
- Mise en place de la vérification d’identité
- Développement de la gestion des contrats numériques
- Implémentation de la logique liée aux paiements
- Développement du back office web

L’application mobile Flutter a été développée par d’autres développeurs. J’ai pris en charge l’ensemble de l’écosystème backend ainsi que l’interface de gestion web.

## Résultat

Carloue fournit une infrastructure complète permettant :

- Aux propriétaires de publier et gérer leurs véhicules
- Aux locataires de rechercher et réserver des voitures
- À la plateforme de gérer les disponibilités et les conflits
- Aux utilisateurs de suivre les processus de vérification et de contractualisation
- De centraliser les transactions et la logique métier
- Aux applications mobiles de consommer une API cohérente et sécurisée

## Conclusion

Les plateformes de location entre particuliers combinent plusieurs domaines complexes : **marketplace, planification, vérification d’identité, contrats, paiements et gestion des rôles**.

Ce projet a renforcé mon expérience dans la conception d’applications Laravel orientées API avec des workflows métier complexes.',

                    'ar' => '# Carloue — بناء منصة لتأجير السيارات بين الأفراد

Carloue هي **منصة لتأجير السيارات بين الأفراد** تربط أصحاب السيارات بالأشخاص الراغبين في استئجار المركبات.

تدير المنصة دورة الإيجار كاملة، بدءًا من إضافة السيارة وإدارة توفرها، وصولًا إلى الحجز والتحقق من الهوية والعقود والمدفوعات.

## التحدي

تتطلب منصة تأجير السيارات بين الأفراد منطق أعمال أكثر تعقيدًا من نظام حجز تقليدي.

كان على النظام التعامل مع:

- أدوار متعددة للمستخدمين، بما في ذلك المالك والمستأجر
- معلومات ومواصفات السيارات
- جداول التوفر
- البحث الجغرافي
- عمليات الحجز
- التحقق من الهوية
- العقود الرقمية
- المعاملات المالية
- منع الحجوزات المتعارضة
- دورة الإيجار بمختلف مراحلها

## الحل

تم بناء المنصة باستخدام **Laravel وبنية تعتمد على API**، مع نظام إدارة ويب لمعالجة العمليات الإدارية، بينما يستهلك تطبيق Flutter واجهات الـ API.

تشمل المكونات الرئيسية:

- إدارة أدوار المالكين والمستأجرين
- إدارة السيارات والوسائط
- إدارة جداول التوفر
- البحث والتصفية حسب الموقع
- نظام الحجز
- التحقق من الهوية
- إدارة العقود الرقمية
- منطق المدفوعات
- إدارة دورة الإيجار
- لوحات الإدارة والتسيير

تم التركيز بشكل خاص على ضمان اتساق منطق الحجز والتوفر لمنع الحجوزات المتعارضة.

## مساهمتي

كنت مسؤولًا عن **الـ backend والـ API ومنطق الأعمال وواجهة الإدارة على الويب**.

شملت مساهمتي:

- تصميم وتطوير البنية الخلفية
- تطوير كامل منطق الأعمال
- بناء Laravel API المستخدم من طرف تطبيق الهاتف
- تطوير workflows الخاصة بالمالكين والمستأجرين
- إدارة السيارات والتوفر
- تطوير نظام الحجز
- تنفيذ عمليات التحقق من الهوية
- تطوير نظام العقود الرقمية
- تنفيذ منطق المدفوعات
- تطوير لوحة الإدارة على الويب

تم تطوير تطبيق Flutter من طرف مطورين آخرين، بينما توليت كامل منظومة الـ backend وواجهة الإدارة الخاصة بالويب.

## النتيجة

توفر Carloue بنية متكاملة تسمح بـ:

- للمالكين بنشر سياراتهم وإدارتها
- للمستأجرين بالبحث عن السيارات وحجزها
- للمنصة بإدارة التوفر ومنع التعارضات
- للمستخدمين بإتمام عمليات التحقق والتعاقد
- بإدارة المعاملات ومنطق الأعمال بشكل مركزي
- للتطبيقات المحمولة باستهلاك API موحدة وآمنة

## الخلاصة

تجمع منصات تأجير السيارات بين الأفراد عدة مجالات معقدة مثل **منطق الـ marketplace، إدارة الجداول الزمنية، التحقق من الهوية، العقود، المدفوعات وإدارة الأدوار**.

عزز هذا المشروع خبرتي في بناء تطبيقات Laravel تعتمد على API وتحتوي على workflows ومنطق أعمال معقد.',
                ],
            ],
        ];
    }

    private static function getZimouProjects(): array
    {
        return [
            'company' => 'Zimou Group',
            'slug' => Str::slug('MyEcom'),
            'name' => 'MyEcom ERP & Installer',
            'header' => [
                'en' => 'All-in-one ERP and onboarding platform for e-commerce operations.',
                'fr' => 'Plateforme ERP tout-en-un avec système d’onboarding pour le e-commerce.',
                'ar' => 'منصة ERP متكاملة مع نظام تهيئة وتشغيل لمتاجر التجارة الإلكترونية.',
            ],
            'description' => [
                'en' => 'All-in-one multi-tenant SaaS ERP combining modular inventory, orders, and CRM with an automated store provisioning engine.',
                'fr' => 'Solution ERP SaaS multi-tenant tout-en-un associant gestion des stocks, commandes, CRM et provisioning automatique de magasins.',
                'ar' => 'نظام ERP SaaS متكامل متعدد المستأجرين يجمع بين إدارة المخزون، الطلبات، والعملاء مع محرك تهيئة تلقائي إطلاق المتاجر.',
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
                'en' => '# MyEcom — Engineering a Scalable E-commerce ERP with Automated Provisioning

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

This project reinforced the importance of **multi-tenant architecture, system automation, and separation of concerns** in delivering reliable, scalable, and easy-to-use enterprise systems.',

                'fr' => '# MyEcom — Conception d’un ERP e-commerce scalable avec provisioning automatisé

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

Ce projet démontre l’importance de **l’automatisation et de l’architecture multi-tenant** dans les plateformes SaaS.',

                'ar' => '# MyEcom — بناء نظام ERP للتجارة الإلكترونية مع تهيئة تلقائية

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

يوضح هذا المشروع أهمية **الأتمتة وبنية Multi-tenant** في بناء منصات SaaS قابلة للتوسع.',
            ],
        ];
    }
}
