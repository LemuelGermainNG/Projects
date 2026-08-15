import type { PageDocument } from '@/runtime/contracts/page'
import { SchemaRenderer } from './SchemaRenderer'

export interface PageRendererProps {
  page: PageDocument
}

/**
 * Renders the page envelope returned by the backend.
 *
 * PageRenderer does not know how to render dashboard, table, form, or other
 * content types. It delegates those schemas to SchemaRenderer.
 */
export function PageRenderer({ page }: PageRendererProps) {
  return (
    <main className="min-h-full bg-background text-foreground">
      <div className="mx-auto w-full max-w-7xl px-6 py-8">
        {page.header ? (
          <section className="mb-8">
            <SchemaRenderer schema={page.header} />
          </section>
        ) : null}

        {page.content ? (
          <section>
            <SchemaRenderer schema={page.content} />
          </section>
        ) : null}
      </div>
    </main>
  )
}
