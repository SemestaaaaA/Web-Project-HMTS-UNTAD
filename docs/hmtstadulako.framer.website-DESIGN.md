---
version: alpha
name: Hmtstadulako
description: |
  The HMTS FT-UNTAD design system embraces a bold, youthful energy rooted in
  technical innovation and institutional pride. The visual language combines a
  deeply dark canvas (#0C0712) with striking accent pops—bright yellow in the
  brand mascot and vibrant orange in call-to-action buttons—creating high
  contrast that feels energetic and purposeful. The design balances
  institutional gravitas (heavy typography, expansive white headings) with
  playful, geometric iconography. This is a system built for a student
  organization website: serious in mission, spirited in tone, and
  unapologetically bold in its use of colour and scale. The aesthetic suggests
  innovation, solidarity, and a community of makers.
source:
  url: "https://hmtstadulako.framer.website/"
  pagesAnalyzed: 1
  extractedAt: 2026-10-06
  tokensMeasured: true
colors:
  primary: "#0C0712"
  link: "#0000EE"
  ink: "#FFFFFF"
  body: "#F3F4F5"
  neutral-1: "#000000"
typography:
  display-lg:
    fontFamily: Poppins
    fontSize: 60px
    fontWeight: 700
    lineHeight: 1.1
    letterSpacing: 0px
  display-md:
    fontFamily: Poppins
    fontSize: 51px
    fontWeight: 700
    lineHeight: 1.1
    letterSpacing: 0px
  heading-sm:
    fontFamily: Switzer
    fontSize: 26px
    fontWeight: 600
    lineHeight: 1.2
    letterSpacing: 0px
  heading-xs:
    fontFamily: Switzer
    fontSize: 18px
    fontWeight: 700
    lineHeight: 1.45
    letterSpacing: 0px
  body-xl:
    fontFamily: Switzer
    fontSize: 21px
    fontWeight: 500
    lineHeight: 1.45
    letterSpacing: 0px
  body-lg:
    fontFamily: Switzer
    fontSize: 18px
    fontWeight: 400
    lineHeight: 1.45
    letterSpacing: 0px
  body-md:
    fontFamily: Switzer
    fontSize: 16px
    fontWeight: 400
    lineHeight: 1.45
    letterSpacing: 0px
  body-md-tight:
    fontFamily: Switzer
    fontSize: 16px
    fontWeight: 400
    lineHeight: 1.2
    letterSpacing: 0px
  body-md-strong:
    fontFamily: Switzer
    fontSize: 16px
    fontWeight: 500
    lineHeight: 1.45
    letterSpacing: 0px
  body-sm:
    fontFamily: Poppins
    fontSize: 13px
    fontWeight: 700
    lineHeight: 1.2
    letterSpacing: 0px
  caption-sm:
    fontFamily: Poppins
    fontSize: 11px
    fontWeight: 700
    lineHeight: 1.2
    letterSpacing: 0px
  caption-xs:
    fontFamily: Poppins
    fontSize: 10px
    fontWeight: 700
    lineHeight: 1.2
    letterSpacing: 0px
rounded:
  none: 0px
spacing:
  xxs: 8px
  xs: 12px
  sm: 16px
  md: 24px
  lg: 32px
  xl: 40px
  xxl: 48px
  xxxl: 56px
  section: 64px
  band: 112px
elevationStrategy: color-blocking
themes:
  derived: light   # the other theme is the site's measured palette
  light:
    bg: "#FBFBFB"
    surface: "#F1F1F1"
    surfaceRaised: "#E9E9E9"
    text: "#111111"
    textMuted: "#737373"
    border: "#D8D8D8"
    accent: "#0C0712"
    accentFg: "#FFFFFF"
    focusRing: "#0C0712"
    elevation: shadow
  dark:
    bg: "#0F1011"
    surface: "#0F1010"
    surfaceRaised: "#222323"
    text: "#FFFFFF"
    textMuted: "#F3F4F5"
    border: "#2C2D2E"
    accent: "#7846B4"
    accentFg: "#FFFFFF"
    focusRing: "#0C0712"
    elevation: "border+surface"
components:
  button-filled:
    textColor: "{colors.link}"
    height: 32.7969px
    padding: "8px 16px 8px 16px"
    fontSize: 12px
    fontFamily: sans-serif
    fontWeight: 400
    rounded: 999px
    backgroundColor: "rgb(204, 102, 0)"
  navigation:
    textColor: "{colors.neutral-1}"
    padding: "24px 0px 24px 0px"
    fontSize: 12px
    fontFamily: sans-serif
    fontWeight: 400
  footer:
    textColor: "{colors.neutral-1}"
    padding: "40px 0px 40px 0px"
    fontSize: 12px
    fontFamily: sans-serif
    fontWeight: 400
    backgroundColor: "{colors.primary}"
  link:
    textColor: "{colors.link}"
    fontSize: 12px
    fontFamily: sans-serif
    fontWeight: 400
states:
breakpoints:
  - width: 375
    containerWidth: 289
    gridColumns: 0
    navLinksVisible: 1
    menuToggleVisible: false
    headingPx: 25
    bodyPx: 12
    sectionPaddingX: 0
  - width: 768
    containerWidth: 672
    gridColumns: 0
    navLinksVisible: 1
    menuToggleVisible: false
    headingPx: 25
    bodyPx: 12
    sectionPaddingX: 0
  - width: 1024
    containerWidth: 848
    gridColumns: 0
    navLinksVisible: 1
    menuToggleVisible: false
    headingPx: 57
    bodyPx: 12
    sectionPaddingX: 0
  - width: 1280
    containerWidth: 1024
    gridColumns: 0
    navLinksVisible: 1
    menuToggleVisible: false
    headingPx: 57
    bodyPx: 12
    sectionPaddingX: 0
  - width: 1440
    containerWidth: 1288
    gridColumns: 0
    navLinksVisible: 1
    menuToggleVisible: false
    headingPx: 57
    bodyPx: 12
    sectionPaddingX: 0
coverage:
  statesFound: 11
  gradientsFound: 0
  rolesUnassigned: 1
  archetypesUnnamed: 0
  archetypesDetected: 0
  responsiveMeasured: true
  stylesheetsBlocked: false
  semanticRampDeclared: false
---

# Design System Inspired by HMTS FT-UNTAD

## 1. Visual Theme & Atmosphere

The HMTS FT-UNTAD design system embraces a **bold, youthful energy** rooted in technical innovation and institutional pride. The visual language combines a deeply dark canvas (`{colors.primary}` — `#0C0712`) with striking accent pops—bright yellow in the brand mascot and vibrant orange in call-to-action buttons—creating high contrast that feels energetic and purposeful. The design balances institutional gravitas (heavy typography, expansive white headings) with playful, geometric iconography. This is a system built for a student organization website: serious in mission, spirited in tone, and unapologetically bold in its use of colour and scale. The aesthetic suggests innovation, solidarity, and a community of makers.

**Key Characteristics**
- Deep, nearly black primary background with minimal use of true black (`#000000`)
- High-contrast white headings (`{colors.ink}` — `#FFFFFF`) against dark surfaces
- Strategic orange (`#CC6600`) in interactive elements for urgent, actionable moments
- Vibrant yellow and cyan accent palette in brand iconography
- Clean, modern sans-serif typography hierarchy with dramatic scale shifts
- Minimal shadows; depth achieved through colour blocking and contrast
- Pill-shaped interactive buttons (radius 9999px)
- Student-organization tone: professional yet approachable

## 2. Color Palette & Roles

### Primary
- **Brand / Primary** (`{colors.primary}` — `#0C0712`): Deep navy-black used as the primary background, brand anchor, and dominant surface colour across the site. Provides the foundational tone for all dark regions.

### Interactive
- **Link** (`{colors.link}` — `#0000EE`): Standard web blue reserved for inline hyperlinks and link-state text. Used sparingly for navigation and text links.
- **Call-to-Action** (`#CC6600`): Warm orange applied to the primary button (Contact Us) and interactive fills. Stands out strongly against the dark background for maximum engagement.

### Neutral Scale
- **Ink / Headings** (`{colors.ink}` — `#FFFFFF`): Pure white text used for all primary headings, hero copy, and high-contrast text on dark backgrounds. The brightest element in the palette.
- **Body Copy** (`{colors.body}` — `#F3F4F5`): Very light neutral grey used for body text, secondary headings, and supporting copy. Provides subtle differentiation from pure white while maintaining legibility.
- **Neutral Decorative** (`{colors.neutral-1}` — `#000000`): True black, unassigned semantic role. Measured on certain elements but not primary to the brand palette; may be used for borders, dividers, or utility purposes.

### Accent Palette (Visual, Non-Text)
- **Brand Mascot Yellow** (`#FFFF00`): Vibrant, saturated yellow featured prominently in the central mascot illustration. Signals energy, boldness, and visual hierarchy.
- **Brand Mascot Cyan** (`#00BFFF` or similar): Bright cyan used in accent lines and geometric elements within the mascot. Provides complementary colour contrast.

## 3. Typography Rules

### Font Family

**Primary: Poppins**
Sans-serif display and emphasis faces. Fallback: `Poppins, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif`

**Secondary: Switzer**
Humanist sans-serif for body and mid-tier headings. Fallback: `Switzer, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif`

**Tertiary: Inter**
Neutral sans-serif utility font. Fallback: `Inter, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif`

**Fallback: sans-serif**
Generic system sans-serif as final fallback.

### Hierarchy

| Role | Font | Size | Weight | Line Height | Letter Spacing | Notes |
|---|---|---|---|---|---|---|
| Display Large | Poppins | 60px | 700 | 1.1 | 0px | Hero headings, maximum impact (`{typography.display-lg}`) |
| Display Medium | Poppins | 51px | 700 | 1.1 | 0px | Primary page headings, large sections (`{typography.display-md}`) |
| Heading Small | Switzer | 26px | 600 | 1.2 | 0px | Section subheadings (`{typography.heading-sm}`) |
| Heading Extra Small | Switzer | 18px | 700 | 1.45 | 0px | Tertiary headings, labels (`{typography.heading-xs}`) |
| Body Large | Switzer | 18px | 400 | 1.45 | 0px | Large body paragraphs, featured text (`{typography.body-lg}`) |
| Body Extra Large | Switzer | 21px | 500 | 1.45 | 0px | Emphasized body copy, callouts (`{typography.body-xl}`) |
| Body Medium Strong | Switzer | 16px | 500 | 1.45 | 0px | Semi-bold body copy, highlights (`{typography.body-md-strong}`) |
| Body Medium | Switzer | 16px | 400 | 1.45 | 0px | Standard body text (`{typography.body-md}`) |
| Body Medium Tight | Switzer | 16px | 400 | 1.2 | 0px | Compact body copy, reduced line height (`{typography.body-md-tight}`) |
| Body Small | Poppins | 13px | 700 | 1.2 | 0px | Labels, overlines, metadata (`{typography.body-sm}`) |
| Caption Small | Poppins | 11px | 700 | 1.2 | 0px | Fine print, footnotes (`{typography.caption-sm}`) |
| Caption Extra Small | Poppins | 10px | 700 | 1.2 | 0px | Minimal text, badges (`{typography.caption-xs}`) |

### Principles

- **Dramatic scale hierarchy**: Heading sizes shift steeply (51px → 26px) to create visual rhythm and guide reading order.
- **Contrast through weight**: Display text uses Poppins 700 for maximum boldness; body uses Switzer 400–500 for clarity and approachability.
- **Tight line heights on display**: 1.1 line height on large headings creates compact, punchy presentation; body text uses 1.45 for comfort and legibility.
- **All-caps labels**: Small Poppins 700 text used for section labels and division headers (e.g., "DIVISI RISET DAN TEKNOLOGI").
- **Switzer for approachability**: Humanist proportions in body text make technical content feel accessible to a student audience.

## 4. Component Stylings

### Buttons

#### Primary Button (Filled, CTA)
- **Background**: `#CC6600` (warm orange)
- **Text Color**: `#000000`
- **Padding**: `8px 16px`
- **Font Size**: `12px`
- **Font Weight**: `400`
- **Font Family**: sans-serif
- **Border Radius**: `999px` (pill shape)
- **Border**: `0px none`
- **Box Shadow**: `none`
- **Width**: `108px` (measured)
- **Height**: `32.8px` (measured)
- **Line Height**: normal
- **Cursor**: pointer

*Notes*: The primary button is highly visible, warm-toned, and inviting. Used for "Contact Us" and key call-to-action moments. The pill shape (9999px radius) signals modern, friendly interaction.

### Navigation

#### Header Navigation
- **Background**: `rgba(0, 0, 0, 0)` (transparent)
- **Text Color**: `#000000`
- **Padding**: `24px 0px`
- **Font Size**: `12px`
- **Font Weight**: `400`
- **Font Family**: sans-serif
- **Border Radius**: `0px` (sharp)
- **Border**: `0px none`
- **Box Shadow**: `none`
- **Width**: `1440px` (measured on standard desktop)
- **Height**: `105px` (measured)
- **Line Height**: normal

*Notes*: Navigation sits on a transparent background, integrating seamlessly with the hero section. Links and menu items are rendered in black against light backgrounds or as white text against dark sections. No border or shadow; pure, clean presentation.

### Links

#### Inline Link
- **Color**: `{colors.link}` (`#0000EE`)
- **Background**: `rgba(0, 0, 0, 0)` (transparent)
- **Padding**: `0px`
- **Font Size**: `12px`
- **Font Weight**: `400`
- **Font Family**: sans-serif
- **Border Radius**: `0px` (no rounding)
- **Border**: `0px none`
- **Box Shadow**: `none`
- **Width**: `133px` (measured context)
- **Height**: `33px` (measured context)
- **Line Height**: normal

#### Link Hover State
- **Color**: Updated via CSS custom properties (system defers to theme variables for hover colour)
- **Text Decoration**: Applied as specified by `--framer-link-hover-text-decoration`
- **Border Radius** (if background applied): Updated to `--framer-link-hover-text-background-radius`

*Notes*: Links use standard web blue (`#0000EE`). Hover states are defined in the framework's CSS custom property system; the exact hover colour may vary depending on the parent theme, but the link maintains its blue default when no explicit theme override is active.

### Footer

#### Footer Container
- **Background**: `{colors.primary}` (`#0C0712`)
- **Text Color**: `#000000`
- **Padding**: `40px 0px`
- **Font Size**: `12px`
- **Font Weight**: `400`
- **Font Family**: sans-serif
- **Border Radius**: `0px` (sharp)
- **Border**: `0px none`
- **Box Shadow**: `none`
- **Width**: `1440px` (measured on standard desktop)
- **Height**: `317.1px` (measured)
- **Line Height**: normal

*Notes*: Footer matches the primary dark background, providing visual continuity. Text rendered at `12px` weight-normal. Padding is generous (`40px` vertical) to accommodate institutional links, legal text, and contact information. Sharp corners maintain the clean, institutional aesthetic.

## 5. Layout Principles

### Spacing System

The spacing system uses an 8px base unit with a progressive scale designed to create rhythm and hierarchy:

- **`{spacing.xxs}`** = 8px — Tight spacing within dense components (e.g., icon + label pairs)
- **`{spacing.xs}`** = 12px — Small gaps between inline elements, badge padding
- **`{spacing.sm}`** = 16px — Standard internal padding for buttons, cards, and form inputs
- **`{spacing.md}`** = 24px — Breathing room between sections, navigation padding
- **`{spacing.lg}`** = 32px — Larger breathing room between major sections
- **`{spacing.xl}`** = 40px — Used in footer padding and hero section internal spacing
- **`{spacing.xxl}`** = 48px — Major section dividers
- **`{spacing.xxxl}`** = 56px — Between distinct content blocks
- **`{spacing.section}`** = 64px — Primary section spacing, dividing chapters of content
- **`{spacing.band}`** = 112px — Hero band height and maximum inter-section gaps

**Usage Context**: Buttons and tight components use `{spacing.xs}`–`{spacing.sm}`. Section padding typically employs `{spacing.md}` to `{spacing.section}`. Hero regions and major transitions use `{spacing.band}` or multiples thereof.

### Grid & Container

- **Maximum Width**: 1440px (observed at 1440px viewport; `{typography.display-lg}` measured in this context)
- **Content Column**: Varies by breakpoint:
  - 375px viewport: 289px content width
  - 768px viewport: 672px content width
  - 1024px viewport: 848px content width
  - 1280px viewport: 1024px content width
  - 1440px viewport: 1288px content width
- **Grid Strategy**: Single-column layout on all measured breakpoints (no multi-column grid observed)
- **Horizontal Padding**: Content is center-aligned with equal margins or uses full-width sections that respect the max-width constraint
- **Section Pattern**: Full-width colour blocks (e.g., hero with dark background, division structure section with gradient or overlay) contain centered text and imagery

### Whitespace Philosophy

Whitespace is used generously to emphasize content hierarchy and create visual breathing room. The design avoids cramping; even on mobile, vertical spacing between sections remains substantial (`{spacing.section}` or `{spacing.band}` equivalents). Horizontal padding is minimal on small screens but maintains readable line lengths. This approach makes the student organization feel established and confident, not cramped or busy.

### Border Radius Scale

- **`{rounded.none}`** = 0px — Applied to images, sharp container corners, and institutional elements (navigation, footer, main sections)

**Component-Specific Radius**:
- Buttons: `999px` (pill-shaped, highly rounded)
- Images: `{rounded.none}` (0px, sharp corners)
- Cards / Containers: `{rounded.none}` (0px, institutional sharpness)
- Inputs / Forms: Not measured; assume `{rounded.none}` per site pattern

*Note*: The system uses a sharp, geometric aesthetic (0px) for most elements, reserving 9999px (pill shape) exclusively for interactive buttons to signal affordance and friendliness.

## 6. Depth & Elevation

| Level | Treatment | Use |
|---|---|---|
| Base / Flat | No shadow; colour-blocked surface (`{colors.primary}` or `{colors.body}`) | Main sections, backgrounds, text blocks |
| Elevated / Interactive | No shadow; background colour change or border (if applicable) | Hover states on buttons and links (colour-blocking strategy) |
| Overlay / Modal | No shadow; z-index layering with opacity applied | Navigation overlays, modal surfaces |

**Shadow Philosophy**: The HMTS FT-UNTAD design system employs **colour-blocking** rather than shadows for depth. Elevation is communicated through:
- Background colour shifts (dark to slightly lighter neutrals, or vice versa)
- Opacity changes (e.g., `43%` or `96%` opacity for overlays or faded elements)
- Z-index layering for stacking order

No drop shadows, blur effects, or multi-layer shadow stacks are used. This keeps the design clean, modern, and performance-friendly while maintaining a technical, institutional aesthetic.

### Opacity Levels

- **43% opacity** (`0.43`): Used for muted backgrounds, disabled states, or faded overlays
- **96% opacity** (`0.96`): Near-full opacity for slightly transparent surfaces or fine-tuned blending

These values are applied sparingly. Full opacity (`100%` / `1.0`) is standard; transparency is used only for specific interactive or decorative moments (e.g., semi-transparent hero overlays, hover states).

### Z-index / Layering

- **Base Layer**: `z-index: 1` — Standard document flow (main content, sections)
- **Secondary Layer**: `z-index: 2` — Fixed or elevated elements (sticky headers, semi-modal overlays)
- **Dropdown Layer**: `z-index: 10` — Navigation dropdowns, select menus
- **Toast / Alert Layer**: `z-index: 2147483647` — System notifications, alerts, toast messages (maximum stacking context)

*Notes*: The stacking order is sparse, reflecting a single-page site with minimal overlapping components. The toast layer is set to the maximum safe z-index, ensuring notifications always appear above all other content.

## 7. Do's and Don'ts

### Do

- **Use colour-blocking for depth**: Layer background colours (`{colors.primary}`, `{colors.body}`, neutral greys) rather than shadows to create visual hierarchy.
- **Apply high contrast in headings**: White (`{colors.ink}`) headings on dark backgrounds; dark or coloured text on light backgrounds for maximum readability and impact.
- **Reserve orange (`#CC6600`) for calls-to-action**: This warm, saturated hue signals interaction and urgency. Use it on buttons, highlighted links, or key affordances only.
- **Maintain generous vertical spacing**: Use `{spacing.section}` or `{spacing.band}` between major sections to avoid a cramped, overwhelming layout.
- **Use Poppins for emphasis**: Bold Poppins text (700 weight) commands attention; use it for section labels, overlines, and the most important headings.
- **Keep interactive elements pill-shaped**: Buttons and key CTAs should use `border-radius: 999px` to signal interactivity and approachability.
- **Pair dark backgrounds with light text**: The system's foundation is a dark (`{colors.primary}` — `#0C0712`) canvas; ensure sufficient contrast with white or light neutral text.
- **Use single-column layouts on mobile**: Do not attempt multi-column grids on small viewports; vertical stacking maintains clarity and usability.

### Don't

- **Don't apply drop shadows or blurs**: The system uses colour-blocking only. Avoid `box-shadow`, `filter: blur()`, or layered shadow effects.
- **Don't mix multiple accent colours indiscriminately**: Orange is the primary interactive accent. Yellow and cyan are reserved for brand iconography (mascot); do not apply them to body copy or buttons without explicit design direction.
- **Don't use rounded corners on non-interactive elements**: Cards, containers, and images should remain sharp (`0px` radius). Reserve `999px` rounding exclusively for buttons and pill-shaped affordances.
- **Don't crowd content horizontally**: Even on desktop, maintain ample horizontal padding and centre-align content. Avoid full-width text running to screen edges.
- **Don't exceed font sizes beyond `{typography.display-lg}` (60px)**: Hierarchy is already dramatic; resist the urge to scale up further, which breaks visual balance.
- **Don't use blue (`#0000EE`) for anything other than hyperlinks**: This is reserved for web standard link colour. Use orange (`#CC6600`) for primary actions instead.
- **Don't omit focus states on interactive elements**: While not explicitly styled in the extraction, ensure keyboard navigation and focus indicators are present (via browser defaults or explicit outline) for accessibility.
- **Don't apply opacity below 43% for text**: Very faint text (`<43%` opacity) may become unreadable; use `43%` or higher for any text or critical interface elements.

## 8. Responsive Behavior

### Breakpoints

| Breakpoint | Width | Key Changes | Content Width | Column Count |
|---|---|---|---|---|
| Mobile | 375px | Single-column layout; largest heading scales to 25px equivalent; body text remains `{typography.body-md}` (16px estimated) | 289px | 1 |
| Tablet | 768px | Single-column layout continues; heading sizing remains compact; section padding stabilizes | 672px | 1 |
| Small Desktop | 1024px | Display heading scales to approximately 57px (measured context); content width expands to 848px | 848px | 1 |
| Standard Desktop | 1280px | Full heading size approaches `{typography.display-lg}` (60px); content width reaches 1024px | 1024px | 1 |
| Large Desktop | 1440px | `{typography.display-lg}` (60px) displayed at full size; max-width container (1440px); content width 1288px | 1288px | 1 |

**Navigation**: Menu links remain visible (count: 1) across all breakpoints. No toggle or collapse behaviour observed; primary navigation structure is consistent from mobile to desktop.

### Touch Targets

- **Minimum Interactive Size**: 32.8px height (measured on primary button) satisfies mobile touch guidelines (48px is ideal, but 32px is acceptable for secondary targets)
- **Button Padding**: `8px 16px` (`{spacing.xs}` top/bottom, `{spacing.sm}` left/right) ensures adequate spacing and visual clearance
- **Link Spacing**: Inline links should maintain at least `8px` of vertical and horizontal clearance from adjacent interactive or text elements
- **Form Input Height**: Assume minimum 40px height (not explicitly measured; infer from button height and UX best practices)

### Collapsing Strategy

- **Vertical Scaling**: Heading font sizes reduce as viewport shrinks (51px → 57px progression observed across breakpoints), but layout remains single-column throughout
- **Content Centering**: Content is always centre-aligned; horizontal margins grow symmetrically as viewport shrinks
- **Section Padding**: Likely remains constant or reduces slightly on mobile (exact mobile padding not measured; assume `{spacing.md}` or `{spacing.lg}` as baseline)
- **Image Scaling**: Images scale proportionally within the content column; no image reflow or hide/show behaviour observed
- **Navigation Layout**: No collapsible menu (hamburger) observed; full navigation remains visible, suggesting a shallow navigation tree suitable for all screen sizes

## 9. Agent Prompt Guide

### Quick Color Reference

Use these colours as the primary reference when implementing components and sections:

- **Primary CTA & Interactive**: Orange (`#CC6600`)
- **Primary Background & Brand**: Dark Navy-Black (`{colors.primary}` — `#0C0712`)
- **Heading & High-Contrast Text**: White (`{colors.ink}` — `#FFFFFF`)
- **Body Copy & Secondary Text**: Light Neutral Grey (`{colors.body}` — `#F3F4F5`)
- **Inline Links**: Web Blue (`{colors.link}` — `#0000EE`)
- **Neutral / Utility**: True Black (`{colors.neutral-1}` — `#000000`)
- **Brand Accent (Mascot)**: Yellow (`#FFFF00`) and Cyan (complementary, within iconography only)

### Iteration Guide

1. **All sections and major content blocks use the dark primary background** (`#0C0712`) or transition via colour-blocking (no shadows). Text on dark backgrounds is always white (`#FFFFFF`) unless specifically marked otherwise.

2. **Headings follow the Poppins → Switzer hierarchy**: Display text is Poppins 700 (51–60px); subheadings are Switzer 600 (26px); body headings are Switzer 400–500 (16–21px). Never mix fonts within a role; maintain the specified family and weight.

3. **Interactive elements (buttons, key links) are pill-shaped** (`border-radius: 999px`) and use orange (`#CC6600`) for primary fills. All buttons maintain `8px 16px` padding and `12px` font size unless a specific component override exists.

4. **Spacing scales from `8px` base unit**: Gaps between elements should be multiples of 8 (e.g., `8px`, `16px`, `24px`, `32px`, `40px`, `48px`, `56px`, `64px`, `112px`). Use `{spacing.section}` (64px) or `{spacing.band}` (112px) for major section dividers.

5. **No shadows or blur effects**: All depth is created through colour contrast and z-index layering. Use `opacity: 0.43` or `opacity: 0.96` for transparency; never use `box-shadow` unless explicitly extracted from the page.

6. **Mobile-first, single-column layout**: All breakpoints (375px to 1440px) maintain a single-column layout. Content width scales predictably; centre-align and maintain ample horizontal margins on mobile.

7. **Opacity values are sparse**: `43%` is used for muted or disabled elements; `96%` for near-full transparency. Default to 100% (full opacity) for all text and primary content.

8. **Z-index layers are minimalist**: `z-index: 1` for base content, `z-index: 2` for sticky/semi-modal overlays, `z-index: 10` for dropdowns, and `z-index: 2147483647` for toast notifications. Do not invent intermediate values.

9. **Typeface pairing**: Poppins (bold, display) pairs with Switzer (humanist body) or Inter (neutral utility). Sans-serif is the fallback for all families. Never use serif fonts.

10. **Brand iconography (mascot) may use yellow and cyan**, but these colours are visual accents only—never apply them to body text, buttons (except as brand easter eggs), or primary interface elements. Reserve them for illustrations and decorative branding.

## 10. Known Gaps

- **Interaction states**: The extraction captured link `:hover` CSS from the framework, but explicit interaction styles (`:active`, `:focus`, `:disabled`) were not measurable on the deployed site. Assume browser defaults (outline on focus) or add custom focus indicators for accessibility.

- **Semantic / Status colors**: No error, success, warning, or info colours were declared or measured. The site does not expose a semantic colour ramp; any status messaging should use text or iconography, not colour alone.

- **Gradients and decorative effects**: No CSS gradients, mesh backgrounds, or animated overlays were extracted. If a visual gradient appears in screenshots, it may be part of a background image or hero illustration rather than a CSS gradient.

- **1 Unassigned colour**: `{colors.neutral-1}` (`#000000` / true black) was measured but has no explicit role in the design system. It is likely used for borders, dividers, or utility purposes; confirm its intended application in component-level work.

- **Button hover, active, and focus states**: Primary button styling was extracted for the filled (default) state only. No explicit hover, active, or focus styles were measured in the CSS. Implement standard affordances (opacity change, colour shift, or focus outline) as per accessibility guidelines.

- **Form input and textarea styles**: Forms and input elements are not present in the analysed page. If they exist elsewhere on the site, their styling (background, border, padding, placeholder text) was not captured; assume body-text sizing and the primary colour palette as fallbacks.

- **Animated transitions and motion**: No CSS animations, transitions, or keyframe data were extracted. If the site uses entrance animations, scroll-based reveals, or hover transitions, they are not documented here.

- **Dark mode / theme toggle**: No theme-switching mechanism was observed. The extracted system represents the single, measured state; a potential dark mode or light variant was not detected.

- **Breakpoint behaviour on mobile**: The 375px breakpoint was measured but represents a single snap; exact collapse points for specific components (e.g., navigation menu, sidebar, carousel) were not granularly tested. The single-column layout holds across all observed viewports.

- **Font loading and fallback rendering**: Poppins, Switzer, and Inter are specified families; actual font delivery method (Google Fonts, self-hosted, system), loading strategy, and fallback rendering are not documented here. Assume standard web font practices.

- **Surfaces behind authentication or dynamic content**: The site may have additional pages, member-only sections, or dynamic components not visible during static extraction. Only the publicly visible homepage was analysed.

---