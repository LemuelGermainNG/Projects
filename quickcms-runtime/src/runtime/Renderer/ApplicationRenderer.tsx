import { useMemo } from 'react'

import { useQuery } from '@tanstack/react-query'

import type { ApplicationDocument } from '@/runtime/Contracts/Application'
import { ApplicationLayout } from '@/composer/Layout/ApplicationLayout'
import { useRuntime } from '@/app/providers/RuntimeProvider'
import { RouteResolver } from '@/runtime/Navigation/RouteResolver'
import { useCurrentRoute } from '@/runtime/Navigation/useCurrentRoute'

interface ApplicationRendererProps {
  document: ApplicationDocument
}

export function ApplicationRenderer({
  document,
}: ApplicationRendererProps) {
  const runtime = useRuntime()
  const { application, schema } = document

  const routeResolver = useMemo(
    () =>
      new RouteResolver({
        applicationId: application.id,
        applicationPath: application.path,
      }),
    [application.id, application.path],
  )

  const currentRoute = useCurrentRoute(routeResolver)

  const pageQuery = useQuery({
    queryKey: [
      'application-page',
      application.id,
      currentRoute.page,
    ],
    queryFn: ({ signal }) =>
      runtime.applicationApi.getPage(
        application.id,
        currentRoute.page,
        signal,
      ),
    enabled: currentRoute.page !== 'dashboard',
    staleTime: 5 * 60 * 1000,
  })

  /*
   * The initial application schema already contains
   * the root/dashboard page.
   *
   * Other pages are loaded from the dedicated
   * page endpoint when the browser route changes.
   */
  const page =
    currentRoute.page === 'dashboard'
      ? schema.root
      : pageQuery.data?.data?.schema?.root

  return (
    <ApplicationLayout
      application={application}
      schema={schema}
    >
      <div className="min-h-full bg-background text-foreground">
        {pageQuery.isPending &&
        currentRoute.page !== 'dashboard' ? (
          <div className="flex min-h-64 items-center justify-center">
            <p className="text-sm text-muted-foreground">
              Loading page…
            </p>
          </div>
        ) : pageQuery.isError &&
          currentRoute.page !== 'dashboard' ? (
          <div className="mx-auto w-full max-w-7xl px-6 py-8">
            <div className="rounded-xl border border-destructive/30 bg-card p-6">
              <h1 className="text-lg font-semibold">
                Unable to load page
              </h1>

              <p className="mt-2 text-sm text-muted-foreground">
                {pageQuery.error instanceof Error
                  ? pageQuery.error.message
                  : 'Unable to load the requested page.'}
              </p>
            </div>
          </div>
        ) : (
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
                Page loaded successfully.
              </p>

              <div className="mt-4 space-y-1 text-sm text-muted-foreground">
                <div>
                  Route:{' '}
                  <code>{currentRoute.route}</code>
                </div>

                <div>
                  Page:{' '}
                  <code>{currentRoute.page}</code>
                </div>

                <div>
                  Path:{' '}
                  <code>{currentRoute.path}</code>
                </div>

                <div>
                  Content:{' '}
                  <code>{page?.content?.type ?? 'none'}</code>
                </div>
              </div>
            </section>
          </div>
        )}
      </div>
    </ApplicationLayout>
  )
}