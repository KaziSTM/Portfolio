<?php

namespace App\Actions\Data\Projects;

use App\Enums\ProjectRole;
use App\Enums\ProjectType;
use Illuminate\Support\Str;

final readonly class SelfProjects
{

    public static function get(): array
    {
        return [
            ...self::getPackages(),
            ...self::getProjects(),
        ];
    }

    private static function getPackages(): array
    {
        return [
            [
                'company' => null,
                'type' => ProjectType::PACKAGE,
                'slug' => Str::slug('Algeria Geo'),
                'name' => 'Algeria Geo',
                'header' => [
                    'en' => 'Standardized Algerian geographic dataset for Laravel applications.',
                    'fr' => 'Jeu de données géographiques algériennes standardisé pour les applications Laravel.',
                    'ar' => 'مجموعة بيانات جغرافية جزائرية موحدة لتطبيقات لارافيل.',
                ],
                'description' => [
                    'en' => 'Standardized open-source Laravel package providing normalized Algerian wilaya and commune data, eloquent relationships, and query helpers.',
                    'fr' => 'Package Laravel open-source fournissant des données structurées des wilayas et communes d’Algérie avec des helpers fluides et multilingues.',
                    'ar' => 'حزمة لارافيل مفتوحة المصدر توفر قاعدة بيانات جغرافية جزائرية موحدة للولايات والبلديات مع واجهة برمجية سريعة ودعم متعدد اللغات.',
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
                    'en' => '# Algeria Geo — Standardizing Location Data in Laravel

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

Even simple datasets can introduce complexity if not standardized properly. By treating data as a first-class citizen, you significantly improve system robustness and scalability.',

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

                    'ar' => '# Algeria Geo — توحيد البيانات الجغرافية في لارافيل

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

هذا المشروع يبرز أهمية **توحيد البيانات** كعنصر أساسي في بناء تطبيقات قوية وقابلة للتوسع.',
                ],
                'is_featured' => false,
            ],
            [
                'company' => null,
                'type' => ProjectType::PACKAGE,
                'slug' => Str::slug('Subscriptions Package'),
                'name' => 'Laravel Subscriptions',
                'header' => 'Flexible subscription engine with feature-based limitations.',
                'description' => [
                    'en' => 'Modular SaaS subscription engine for Laravel supporting feature-based limitations, period resets, and flexible billing logic.',
                    'fr' => 'Moteur d’abonnement SaaS modulaire pour Laravel gérant les limitations de fonctionnalités, la réinitialisation des périodes et la facturation.',
                    'ar' => 'محرك اشتراكات مرن لتطبيقات SaaS في لارافيل يوفر إدارة الباقات، القيود الديناميكية للميزات، وبنية قابلة للتوسع.',
                ],
                'link' => 'https://github.com/KaziSTM/subscriptions',
                'main_tags' => [
                    ProjectRole::BACKEND,
                ],
                'is_active' => true,
                'tags' => [
                    'Laravel Package',
                    'SaaS',
                    'Billing',
                    'Architecture',
                ],
                'details' => '# Laravel Subscriptions — Modular SaaS Billing Engine

A flexible subscription system built for SaaS applications, focusing on feature-based limitations and scalable architecture.

Designed to support complex billing logic while remaining extensible and developer-friendly.',
                'is_featured' => true,
            ],
            [
                'company' => null,
                'type' => ProjectType::PACKAGE,
                'slug' => Str::slug('Vargo'),
                'name' => 'Vargo',
                'header' => [
                    'en' => 'Unified delivery integration platform for Algerian logistics providers.',
                    'fr' => 'Plateforme unifiée d’intégration des services de livraison en Algérie.',
                    'ar' => 'منصة موحدة لدمج خدمات التوصيل في الجزائر.',
                ],
                'description' => [
                    'en' => 'Logistics integration layer and SDK standardizing Algerian delivery carriers behind a unified, driver-based API interface.',
                    'fr' => 'Moteur d’intégration logistique et SDK unifiant les API des transporteurs algériens sous une interface basée sur des drivers.',
                    'ar' => 'منصة وSDK لدمج خدمات التوصيل في الجزائر عبر واجهة برمجية موحدة ونظام Drivers لتبسيط التتبع وإنشاء الشحنات.',
                ],
                'link' => 'https://github.com/KaziSTM/vargo',
                'main_tags' => [
                    ProjectRole::BACKEND,
                ],
                'tags' => [
                    'SDK',
                    'API',
                    'Logistics',
                    'Integration',
                    'Laravel Package',
                ],
                'is_in_progress' => false,
                'details' => [
                    'en' => '# Vargo — Engineering a Unified Delivery Integration Layer

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

A well-designed integration layer can hide complexity while providing flexibility, scalability, and a significantly better developer experience.',

                    'fr' => '# Vargo — Plateforme d’intégration unifiée des services de livraison

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

Ce projet met en avant l’importance de **l’abstraction et du design d’API**.',

                    'ar' => '# Vargo — منصة موحدة لدمج خدمات التوصيل

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

هذا المشروع يبرز أهمية **تصميم APIs والطبقات الوسيطة**.',
                ],
            ],
        ];
    }

    private static function getProjects(): array
    {
        return [
            [
                'company' => null,
                'slug' => Str::slug('Halal Audit'),
                'type' => ProjectType::PROJECT,
                'name' => 'Halal Audit',
                'header' => [
                    'en' => 'Modern landing page for halal certification and audit services.',
                    'fr' => 'Landing page moderne pour les services de certification et d’audit halal.',
                    'ar' => 'صفحة هبوط حديثة لخدمات التدقيق والشهادات الحلال.',
                ],
                'description' => [
                    'en' => 'Corporate platform designed for international halal certification and audit services, focused on content hierarchy, trust, and conversion.',
                    'fr' => 'Plateforme corporate axée sur la certification et l’audit halal international, optimisée pour la clarté, la confiance et la conversion.',
                    'ar' => 'منصة تعريفية واحترافية لعرض خدمات التدقيق والشهادات الحلال الدولية مع تركيز عالي على الوضوح وبناء الثقة وتحقيق التحويل.',
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
                    'en' => '# Halal Audit — Engineering a High-Conversion Corporate Landing Page

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

High-performing landing pages rely on **clear messaging, structured content, and optimized performance** — not just visual design.',

                    'fr' => '# Halal Audit — Conception d’une landing page corporate à forte conversion

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

Ce projet montre que **la clarté et la structure** sont essentielles pour des produits simples mais efficaces.',

                    'ar' => '# Halal Audit — تصميم صفحة هبوط عالية التحويل

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

هذا المشروع يوضح أن **الوضوح والتنظيم** هما الأساس في نجاح صفحات الهبوط.',
                ],
            ],
            [
                'company' => null,
                'slug' => Str::slug('TradeConnect'),
                'type' => ProjectType::PROJECT,
                'name' => 'TradeConnect',
                'header' => [
                    'en' => 'Multi-tenant B2B trade marketing and field operations platform.',
                    'fr' => 'Plateforme B2B multi-tenant de trade marketing et de gestion des opérations terrain.',
                    'ar' => 'منصة B2B متعددة المستأجرين لإدارة التسويق التجاري والعمليات الميدانية.',
                ],
                'description' => [
                    'en' => 'Enterprise B2B platform designed for FMCG companies and their subsidiaries to manage trade marketing operations, field teams, product catalogues, inventory, geographic zones, and execution reporting from a centralized system.',
                    'fr' => 'Plateforme B2B destinée aux entreprises FMCG et à leurs filiales pour gérer les opérations de trade marketing, les équipes terrain, les catalogues produits, les stocks, les zones géographiques et le reporting depuis une plateforme centralisée.',
                    'ar' => 'منصة B2B موجهة لشركات السلع الاستهلاكية سريعة التداول وفروعها لإدارة عمليات التسويق التجاري والفرق الميدانية وكتالوجات المنتجات والمخزون والمناطق الجغرافية والتقارير من خلال نظام مركزي.',
                ],
                'link' => null,
                'main_tags' => [
                    ProjectRole::BACKEND,
                    ProjectRole::FULLSTACK,
                ],
                'is_featured' => true,
                'is_in_progress' => true,
                'tags' => [
                    'B2B',
                    'SaaS',
                    'Multi-Tenancy',
                    'Trade Marketing',
                    'Laravel',
                    'Filament',
                    'API',
                    'Inventory',
                ],
                'start' => '2025-04-12',
                'end' => null,
                'details' => [
                    'en' => '# TradeConnect — Engineering a Multi-Tenant B2B Trade Marketing Platform

TradeConnect is a **multi-tenant B2B platform designed for FMCG companies and their subsidiaries** to manage, monitor, and optimize trade marketing activities and field operations from a centralized system.

The platform combines organizational management, field execution, product catalogue management, inventory tracking, geographic intelligence, and reporting into a single enterprise application.

## The Challenge

Trade marketing operations involve multiple organizational entities, field teams, retail clients, products, warehouses, and geographic territories.

The platform needed to provide:

- Secure multi-tenant isolation
- Hierarchical user roles and permissions
- Management of organizational divisions
- Geographic territory and zone management
- Retail client and outlet management
- Field task assignment and execution
- Reusable operational instructions
- Product catalogue and variant management
- Multi-location inventory tracking
- Field reports and photo evidence
- Complete status history and auditability
- A centralized REST API for external clients

The system also needed to support multiple languages and maintain a consistent data model across all tenants.

## The Approach

The platform was designed using a **domain-driven and modular architecture**, separating the application into dedicated business domains.

The main domains include:

- **Core** — authentication, authorization, tenants, and settings
- **Organization** — divisions, geographic zones, and clients
- **Tasks** — field tasks, instructions, and status histories
- **Products** — brands, categories, products, and variants
- **Stock** — warehouses, stock levels, and stock movements

Each module maintains its own models, migrations, API controllers, resources, routes, and domain-specific authorization logic.

## Multi-Tenancy

A major part of the platform is its multi-tenant architecture.

Tenant context is resolved through middleware and used to isolate application data. Users belong to tenants, while roles and permissions are managed within the tenant context.

The architecture supports tenant-specific database connections and configurable tenant isolation strategies.

## Organization & Geographic Management

The organization domain allows companies to model their operational structure using hierarchical divisions.

Divisions support:

- Parent/child relationships
- User assignments
- Zone assignments
- Hierarchical navigation

Geographic zones use spatial data and support:

- Hierarchical zones
- Polygon-based territories
- WGS84 coordinates
- Spatial containment queries
- Bounding-box queries
- Distance calculations
- Geographic filtering

Clients can be associated with zones and divisions and can be located using latitude and longitude coordinates.

## Field Task Management

The task domain provides the operational layer for field teams.

The platform supports:

- Creating and assigning field tasks
- Assigning tasks to merchandisers
- Assigning trade supervisors
- Associating tasks with zones and clients
- Reusable operational instructions
- Task priorities
- Distance-based task ordering
- Task notes
- Execution reports
- Photo evidence
- Supervisor review workflows

Tasks can be associated with both geographic zones and individual clients, while instructions can be reused across multiple tasks.

## Status & Audit Management

One of the key architectural features is the centralized **polymorphic status history system**.

Instead of overwriting an entity\'s status, every status transition is stored in `status_histories`.

Each transition records:

- Current status
- Previous status
- User who made the change
- Timestamp
- Reason for the change
- Entity being modified

The latest status is exposed through a virtual model accessor while the complete history remains available for auditing, compliance, and reporting.

This same mechanism can be shared by different entities such as tasks and instructions through polymorphic relationships.

## Product Catalogue

The catalogue domain provides centralized product management for trade marketing operations.

It supports:

- Brand management
- Hierarchical categories
- Products
- Product variants
- SKU management
- Product/category relationships
- Brand/category relationships
- Product assignments to divisions
- Variant pricing

The catalogue is separated from inventory so that products and their variants can be managed independently from their physical stock.

## Inventory Management

The inventory domain manages stock across multiple warehouses and locations.

The system supports:

- Warehouse management
- Warehouse managers
- Stock levels
- Variant-level inventory
- Stock movement history
- Inbound and outbound movements
- Movement reasons
- Real-time stock quantities
- Inventory tracking across locations

Stock movements provide a historical record while `StockLevel` represents the current inventory state.

## Field Execution & Reporting

Field teams can execute assigned tasks and provide evidence of their work.

The reporting layer supports:

- Task execution reports
- Photo evidence
- POS material information
- Shelf photos
- Pricing information
- Stock information
- Compliance monitoring
- Supervisor review and approval

This allows field execution to be connected directly to the operational and commercial data managed by the platform.

## Authentication & Authorization

The platform exposes a REST API secured using **Laravel Sanctum**.

The authorization model combines:

- Authentication tokens
- Role-Based Access Control
- Granular permissions
- Policy-based authorization
- Tenant-level isolation

The documented role hierarchy includes Super Admin, Admin, Manager, and Staff, with permissions controlling operations such as viewing, creating, updating, and deleting resources.

## API Architecture

The system follows a RESTful API architecture with versioned endpoints.

API requests follow a layered flow:

1. Authentication
2. Tenant context resolution
3. Authorization
4. Controller
5. Service/domain logic
6. Eloquent models
7. API resources
8. JSON serialization
9. Pagination and metadata

The API supports resource collections, individual resources, related resources, pagination, and standardized response structures.

Examples include task resources and related endpoints for notes, status histories, and reports.

## Multi-Language Support

The platform supports:

- English
- French
- Arabic
- User-specific language preferences
- UTF-8 content
- Right-to-left interfaces

Translatable domain content is handled using dedicated translation support.

## Technical Architecture

The platform was built around a modern Laravel 13 & Filament 5 stack:

- **Laravel 13** (`laravel/framework ^13.6`)
- **PHP 8.4+** (`^8.4`)
- **Filament v5** (`v5.6`)
- **Tailwind CSS v4** (`@tailwindcss/vite ^4.1`)
- **Vite 7** (`vite ^7.3`)
- **Modular Multi-Tenancy Architecture** (`nwidart/laravel-modules ^13.0`, `composer-merge-plugin`)
- **API & Security**: Laravel Sanctum (`v4.3`), Filament Breezy (`v3.2`), OTP Verification (`ichtrojan/laravel-otp`), Phone Validation (`laravel-phone ^6.0`)
- **GIS & Mapping Intelligence**: Filament Google Maps (`v5.0`), Filament Pinpoint (`^1.1`), Algeria Geo (`kazistm/algeria-geo ^2.0`), Select Tree (`v4.1`)
- **Spatie & Filament Plugins**: Spatie Permission (`^7.3`), Spatie Translatable (`2.0`), Spatie Media Library & Tags (`v5.6`), Adjacency List (`staudenmeir/laravel-adjacency-list ^1.26`), Laravel Enum (`^6.12`), Filament Spotlight & Language Switch
- **Push Notifications & Firebase**: Firebase SDK (`kreait/laravel-firebase ^7.2`), FCM Notification Channels (`^6.1`), Pusher Server & JS (`^7.2` / `^8.5`), Laravel Echo
- **Exporting & Utilities**: mPDF (`mpdf/mpdf ^8.3`), Predis (`^3.4`), Google Maps JS Loader (`^1.16`)
- **Testing & Quality Assurance**: Pest v4 (`pestphp/pest ^4.6`, Browser & Laravel plugins), Playwright (`^1.57`), Larastan (`^3.9`), LaraDumps (`^5.3`)

## Architecture & Engineering Principles

The system follows several architectural patterns:

- Domain-Driven Design
- Modular architecture
- Service layer pattern
- Repository-style Eloquent usage
- Polymorphic relationships
- Observer/event-based behavior
- Trait-based reusable functionality
- Virtual model accessors
- Policy-based authorization
- SOLID principles

The modular structure keeps Organization, Tasks, Products, and Stock domains independently maintainable while allowing them to interact through defined relationships.

## Performance & Data Integrity

The platform uses several database and application-level optimizations:

- Foreign-key indexes
- Compound indexes
- Spatial indexes
- Eager loading
- Pagination
- Redis caching
- Tenant-aware cache keys
- Query result caching
- Database transactions
- Soft deletes

The database follows a normalized 3NF structure with explicit foreign keys and strategic indexing.

## Security

Security was implemented across several layers:

- Sanctum token authentication
- RBAC
- Granular permissions
- Policy authorization
- Tenant isolation
- Password hashing
- CSRF protection
- API rate limiting
- Audit trails
- Soft deletion
- Configurable tenant-specific encryption
- Optional separate databases per tenant

Tenant context is validated during requests so users cannot access data belonging to another tenant.

## My Contribution

- Designed and implemented the backend architecture
- Built the multi-tenant infrastructure
- Developed the core business logic
- Designed the modular domain architecture
- Implemented authentication and authorization
- Developed the Organization domain
- Built the field task and instruction management system
- Implemented the polymorphic status history architecture
- Developed the product catalogue
- Implemented inventory and stock movement management
- Built RESTful APIs and API resources
- Implemented geographic and spatial functionality
- Developed administrative interfaces with Filament
- Implemented multilingual functionality
- Worked on data integrity, authorization, and performance optimization

## Outcome

TradeConnect provides FMCG organizations with a centralized operational platform capable of connecting:

**Organization → Geography → Clients → Field Teams → Tasks → Products → Inventory → Reports**

The result is a scalable system that gives companies greater visibility over field execution while maintaining strict tenant isolation and detailed operational auditability.

## Takeaways

TradeConnect was a technically demanding enterprise application because it combined several complex domains into a single platform.

The project provided extensive experience with **multi-tenancy, modular architecture, RBAC, spatial data, field operations, inventory management, REST APIs, polymorphic audit trails, and enterprise-grade Laravel architecture**.',

                    'fr' => '# TradeConnect — Conception d’une plateforme B2B multi-tenant de trade marketing

TradeConnect est une **plateforme B2B multi-tenant destinée aux entreprises FMCG et à leurs filiales** pour gérer, suivre et optimiser les opérations de trade marketing et les activités terrain depuis un système centralisé.

La plateforme regroupe la gestion organisationnelle, les opérations terrain, le catalogue produits, les stocks, les données géographiques et le reporting au sein d’une même application.

## Le défi

Les opérations de trade marketing impliquent plusieurs entités organisationnelles, équipes terrain, points de vente, produits, entrepôts et territoires géographiques.

La plateforme devait notamment gérer :

- L’isolation multi-tenant
- Les rôles et permissions hiérarchiques
- Les divisions organisationnelles
- Les zones géographiques
- Les clients et points de vente
- Les tâches terrain
- Les instructions opérationnelles réutilisables
- Les catalogues et variantes produits
- Les stocks multi-emplacements
- Les rapports terrain et preuves photographiques
- L’historique complet des statuts
- Une API REST centralisée

## L’approche

L’application repose sur une **architecture modulaire inspirée du Domain-Driven Design**.

Les principaux domaines sont :

- **Core** — authentification, autorisation, tenants et paramètres
- **Organization** — divisions, zones et clients
- **Tasks** — tâches, instructions et historiques de statuts
- **Products** — marques, catégories, produits et variantes
- **Stock** — entrepôts, niveaux de stock et mouvements

Chaque module possède ses propres modèles, migrations, routes API, ressources et mécanismes d’autorisation.

## Multi-tenancy

La plateforme utilise une architecture multi-tenant permettant d’isoler les données et la configuration de chaque organisation.

Le contexte du tenant est résolu par middleware et utilisé pour filtrer les accès aux données. L’architecture prend également en charge les connexions de base de données spécifiques aux tenants.

## Organisation & géographie

Le domaine Organization permet de représenter la structure opérationnelle des entreprises à travers des divisions hiérarchiques.

Il comprend :

- Divisions parent/enfant
- Affectation des utilisateurs
- Affectation aux zones
- Zones géographiques hiérarchiques
- Polygones géographiques
- Coordonnées WGS84
- Requêtes spatiales
- Calculs de distance
- Gestion des clients et points de vente

Les zones peuvent être utilisées pour filtrer et organiser les opérations terrain.

## Gestion des tâches terrain

Le module Tasks permet de gérer l’exécution des opérations terrain.

Il prend en charge :

- Création et affectation des tâches
- Affectation aux merchandisers
- Affectation aux superviseurs
- Association aux zones et clients
- Instructions réutilisables
- Priorités
- Tri selon la distance
- Notes
- Rapports
- Preuves photographiques
- Validation par les superviseurs

## Gestion des statuts & audit

Une architecture de **Status History polymorphe** permet de conserver chaque changement de statut au lieu de l’écraser.

Chaque changement conserve :

- Le statut actuel
- Le statut précédent
- L’utilisateur responsable
- La date
- La raison du changement
- L’entité concernée

Cela fournit un historique complet et immuable exploitable pour l’audit, la conformité et le reporting.

## Catalogue produits

Le catalogue permet de gérer :

- Les marques
- Les catégories hiérarchiques
- Les produits
- Les variantes
- Les SKU
- Les relations produits/catégories
- Les relations marques/catégories
- L’affectation des produits aux divisions
- Les prix des variantes

## Gestion des stocks

Le module Stock permet de gérer les stocks sur plusieurs entrepôts.

Il comprend :

- Gestion des entrepôts
- Gestion des responsables
- Niveaux de stock
- Stock par variante
- Mouvements de stock
- Entrées et sorties
- Historique des mouvements
- Motifs des mouvements
- Suivi des quantités

## Reporting terrain

Les équipes terrain peuvent documenter l’exécution de leurs tâches grâce à :

- Rapports d’exécution
- Preuves photographiques
- Informations sur les supports POS
- Photos des rayons
- Informations de prix
- Données de stock
- Suivi de conformité
- Validation par les superviseurs

## API & sécurité

L’application expose une API REST sécurisée avec **Laravel Sanctum**.

Elle combine :

- Authentification par token
- RBAC
- Permissions granulaires
- Policies
- Isolation tenant
- Validation des accès

## Architecture technique

L’application repose sur un écosystème moderne basé sur Laravel 13 et Filament 5 :

- **Laravel 13** (`laravel/framework ^13.6`)
- **PHP 8.4+** (`^8.4`)
- **Filament v5** (`v5.6`)
- **Tailwind CSS v4** (`@tailwindcss/vite ^4.1`)
- **Vite 7** (`vite ^7.3`)
- **Architecture modulaire & multi-tenancy** (`nwidart/laravel-modules ^13.0`, `composer-merge-plugin`)
- **API & sécurité** : Laravel Sanctum (`v4.3`), Filament Breezy (`v3.2`), vérification OTP (`ichtrojan/laravel-otp`), validation des numéros (`laravel-phone ^6.0`)
- **Cartographie & SIG** : Filament Google Maps (`v5.0`), Filament Pinpoint (`^1.1`), Algeria Geo (`kazistm/algeria-geo ^2.0`), Select Tree (`v4.1`)
- **Écosystème Spatie & Filament** : Spatie Permission (`^7.3`), Spatie Translatable (`2.0`), Spatie Media Library & Tags (`v5.6`), Adjacency List (`staudenmeir/laravel-adjacency-list ^1.26`), Laravel Enum (`^6.12`), Filament Spotlight & Language Switch
- **Notifications push & Firebase** : SDK Firebase (`kreait/laravel-firebase ^7.2`), canaux FCM (`^6.1`), serveur & JS Pusher (`^7.2` / `^8.5`), Laravel Echo
- **Génération de documents & utilitaires** : mPDF (`mpdf/mpdf ^8.3`), Predis (`^3.4`), Google Maps JS Loader (`^1.16`)
- **Tests & qualité du code** : Pest v4 (`pestphp/pest ^4.6`, plugins Browser & Laravel), Playwright (`^1.57`), Larastan (`^3.9`), LaraDumps (`^5.3`)

## Ma contribution

- Conception et développement de l’architecture backend
- Mise en place de la multi-tenancy
- Développement de la logique métier
- Conception de l’architecture modulaire
- Authentification et autorisation
- Développement du domaine Organization
- Développement du système de tâches terrain
- Mise en place de l’historique polymorphe des statuts
- Développement du catalogue produits
- Gestion des stocks
- Développement des APIs REST
- Fonctionnalités géographiques et spatiales
- Interfaces d’administration avec Filament
- Support multilingue
- Optimisation des performances et de l’intégrité des données

## Résultat

TradeConnect permet de connecter au sein d’un même système :

**Organisation → Géographie → Clients → Équipes terrain → Tâches → Produits → Stocks → Rapports**

La plateforme fournit ainsi une visibilité centralisée sur les opérations terrain tout en garantissant l’isolation des tenants et une traçabilité complète des opérations.

## Conclusion

TradeConnect a constitué un projet particulièrement riche techniquement en combinant **multi-tenancy, architecture modulaire, RBAC, données spatiales, opérations terrain, gestion des stocks, APIs REST et audit polymorphe** dans une architecture Laravel d’entreprise.',

                    'ar' => '# TradeConnect — بناء منصة B2B متعددة المستأجرين لإدارة التسويق التجاري

TradeConnect هي **منصة B2B متعددة المستأجرين موجهة لشركات السلع الاستهلاكية سريعة التداول وفروعها** لإدارة ومتابعة وتحسين عمليات التسويق التجاري والعمليات الميدانية من خلال نظام مركزي.

تجمع المنصة بين إدارة الهيكل التنظيمي والعمليات الميدانية وكتالوج المنتجات والمخزون والمعلومات الجغرافية والتقارير في تطبيق مؤسسي واحد.

## التحدي

تتضمن عمليات التسويق التجاري عدة كيانات تنظيمية وفرق ميدانية ونقاط بيع ومنتجات ومستودعات ومناطق جغرافية.

كان النظام بحاجة إلى دعم:

- عزل بيانات المستأجرين
- الأدوار والصلاحيات الهرمية
- إدارة الأقسام التنظيمية
- إدارة المناطق الجغرافية
- إدارة العملاء ونقاط البيع
- إدارة المهام الميدانية
- التعليمات التشغيلية القابلة لإعادة الاستخدام
- كتالوج المنتجات والمتغيرات
- إدارة المخزون في عدة مواقع
- تقارير العمليات الميدانية والأدلة المصورة
- سجل كامل لتغييرات الحالات
- REST API مركزية

## الحل

تم تصميم المنصة باستخدام **بنية معيارية مستوحاة من Domain-Driven Design**.

تشمل المجالات الرئيسية:

- **Core** — المصادقة والصلاحيات والمستأجرون والإعدادات
- **Organization** — الأقسام والمناطق والعملاء
- **Tasks** — المهام والتعليمات وسجل الحالات
- **Products** — العلامات التجارية والفئات والمنتجات والمتغيرات
- **Stock** — المستودعات ومستويات المخزون وحركاته

كل وحدة مستقلة وتحتوي على نماذجها وعمليات الترحيل ومسارات API وموارد API وآليات الصلاحيات الخاصة بها.

## تعدد المستأجرين

تعتمد المنصة على بنية Multi-Tenant تسمح بعزل بيانات وإعدادات كل مؤسسة.

يتم تحديد سياق المستأجر من خلال Middleware، ثم استخدامه لعزل البيانات والطلبات. كما تدعم البنية اتصالات قواعد بيانات مخصصة لكل مستأجر.

## الهيكل التنظيمي والموقع الجغرافي

يسمح نطاق Organization بتمثيل الهيكل التشغيلي للشركات من خلال أقسام هرمية.

تشمل الوظائف:

- أقسام مترابطة بنظام أب/أبناء
- ربط المستخدمين بالأقسام
- ربط الأقسام بالمناطق
- مناطق جغرافية هرمية
- مضلعات جغرافية
- إحداثيات WGS84
- استعلامات مكانية
- حساب المسافات
- إدارة العملاء ونقاط البيع

يمكن استخدام المناطق الجغرافية لتنظيم وتصفية العمليات الميدانية.

## إدارة المهام الميدانية

يوفر نظام Tasks طبقة كاملة لإدارة العمليات الميدانية.

يدعم:

- إنشاء وإسناد المهام
- إسناد المهام إلى فرق الـ Merchandisers
- إسناد المشرفين
- ربط المهام بالمناطق والعملاء
- التعليمات التشغيلية القابلة لإعادة الاستخدام
- الأولويات
- ترتيب المهام حسب المسافة
- الملاحظات
- التقارير
- الأدلة المصورة
- مراجعة واعتماد المشرفين

## إدارة الحالات والتدقيق

تم بناء نظام **Polymorphic Status History** بحيث يتم الاحتفاظ بكل تغيير في الحالة بدلًا من استبداله.

يتم تسجيل:

- الحالة الحالية
- الحالة السابقة
- المستخدم الذي قام بالتغيير
- وقت التغيير
- سبب التغيير
- الكيان المتأثر

يوفر ذلك سجلًا كاملًا وغير قابل للتعديل يمكن استخدامه للتدقيق والامتثال والتقارير.

## كتالوج المنتجات

يدعم النظام:

- إدارة العلامات التجارية
- الفئات الهرمية
- المنتجات
- المتغيرات
- SKU
- العلاقات بين المنتجات والفئات
- العلاقات بين العلامات التجارية والفئات
- ربط المنتجات بالأقسام
- أسعار المتغيرات

## إدارة المخزون

يسمح نظام Stock بإدارة المخزون عبر عدة مستودعات.

يشمل:

- إدارة المستودعات
- إدارة المسؤولين عن المستودعات
- مستويات المخزون
- المخزون حسب المتغير
- حركات المخزون
- عمليات الدخول والخروج
- سجل حركات المخزون
- أسباب الحركات
- متابعة الكميات

## التقارير والعمليات الميدانية

يمكن للفرق الميدانية توثيق تنفيذ المهام من خلال:

- تقارير التنفيذ
- الأدلة المصورة
- معلومات مواد نقاط البيع
- صور الرفوف
- معلومات الأسعار
- بيانات المخزون
- متابعة الالتزام
- مراجعة واعتماد المشرفين

## API والأمان

توفر المنصة REST API مؤمنة باستخدام **Laravel Sanctum**.

وتعتمد على:

- المصادقة باستخدام Tokens
- RBAC
- صلاحيات دقيقة
- Policies
- عزل المستأجرين
- التحقق من الصلاحيات

## البنية التقنية

تم بناء المنصة على منظومة حديثة تعتمد على Laravel 13 و Filament 5:

- **Laravel 13** (`laravel/framework ^13.6`)
- **PHP 8.4+** (`^8.4`)
- **Filament v5** (`v5.6`)
- **Tailwind CSS v4** (`@tailwindcss/vite ^4.1`)
- **Vite 7** (`vite ^7.3`)
- **البنية المعيارية وتعدد المستأجرين** (`nwidart/laravel-modules ^13.0` مع `composer-merge-plugin`)
- **API والأمان**: Laravel Sanctum (`v4.3`)، Filament Breezy (`v3.2`)، التحقق عبر OTP (`ichtrojan/laravel-otp`)، التحقق من أرقام الهواتف (`laravel-phone ^6.0`)
- **الخرائط ونظم المعلومات الجغرافية (GIS)**: Filament Google Maps (`v5.0`)، Filament Pinpoint (`^1.1`)، Algeria Geo (`kazistm/algeria-geo ^2.0`)، Select Tree (`v4.1`)
- **حزم Spatie و Filament**: Spatie Permission (`^7.3`)، Spatie Translatable (`2.0`)، Spatie Media Library & Tags (`v5.6`)، Adjacency List (`staudenmeir/laravel-adjacency-list ^1.26`)، Laravel Enum (`^6.12`)، Filament Spotlight & Language Switch
- **الإشعارات اللحظية و Firebase**: Firebase SDK (`kreait/laravel-firebase ^7.2`)، قنوات FCM (`^6.1`)، Pusher (`^7.2` / `^8.5`)، Laravel Echo
- **إنشاء التقارير والأدوات**: mPDF (`mpdf/mpdf ^8.3`)، Predis (`^3.4`)، Google Maps JS Loader (`^1.16`)
- **الاختبارات وجودة الكود**: Pest v4 (`pestphp/pest ^4.6` مع الإضافات الخاصة بـ Browser و Laravel)، Playwright (`^1.57`)، Larastan (`^3.9`)، LaraDumps (`^5.3`)

## مساهمتي

- تصميم وتطوير البنية الخلفية
- بناء نظام Multi-Tenancy
- تطوير منطق الأعمال
- تصميم البنية المعيارية
- تطوير المصادقة والصلاحيات
- تطوير نطاق Organization
- تطوير نظام المهام الميدانية
- بناء نظام سجل الحالات متعدد الأشكال
- تطوير كتالوج المنتجات
- تطوير نظام المخزون
- بناء REST APIs
- تطوير الوظائف الجغرافية والمكانية
- تطوير واجهات الإدارة باستخدام Filament
- دعم تعدد اللغات
- تحسين الأداء وسلامة البيانات

## النتيجة

تربط TradeConnect عدة جوانب تشغيلية في نظام واحد:

**الهيكل التنظيمي → المناطق الجغرافية → العملاء → الفرق الميدانية → المهام → المنتجات → المخزون → التقارير**

توفر المنصة بذلك رؤية مركزية للعمليات الميدانية مع الحفاظ على عزل المستأجرين وتوفير سجل كامل للعمليات والتغييرات.

## الخلاصة

كان TradeConnect مشروعًا مؤسسيًا غنيًا من الناحية التقنية، حيث جمع بين **Multi-Tenancy وModular Architecture وRBAC والبيانات المكانية والعمليات الميدانية وإدارة المخزون وREST APIs وسجلات التدقيق متعددة الأشكال** ضمن بنية Laravel قابلة للتوسع.',
                ],
            ],
        ];
    }

}
