import type { ApplicationDocument } from '@/runtime/Contracts/Application'
import { ApplicationLayout } from '@/composer/Layout/ApplicationLayout'

interface ApplicationRendererProps {
  document: ApplicationDocument
}

export function ApplicationRenderer({
  document,
}: ApplicationRendererProps) {
  const { application, schema } = document
  const page = schema.root

  return (
    <ApplicationLayout
      application={application}
      schema={schema}
    >
      <div className="min-h-full bg-background text-foreground">
        <div className="mx-auto w-full max-w-7xl px-6 py-8">
          <header className="mb-8">
            <p className="text-sm text-muted-foreground">
              {application.name}
            </p>

            <h1 className="mt-1 text-3xl font-semibold tracking-tight">
              {page?.header?.title ?? application.name}
            </h1>

            {page?.header?.description ? (
              <p className="mt-2 text-muted-foreground">
                {page.header.description}
              </p>
            ) : null}
          </header>

          <section className="rounded-xl border bg-card p-6 shadow-sm">
            <p className="text-sm font-medium">
              Runtime connected
            </p>

            <p className="mt-1 text-sm text-muted-foreground">
              Application schema loaded successfully.
            </p>

            <div className="mt-4 text-sm text-muted-foreground">
              Root content:{' '}
              <code>
                {page?.content?.type ?? 'none'}
              </code>
            </div>
          </section>
        </div>
      </div>
    </ApplicationLayout>
  )
}