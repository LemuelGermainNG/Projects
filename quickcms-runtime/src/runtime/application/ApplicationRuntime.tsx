import { useMemo } from 'react'
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card'
import { Skeleton } from '@/components/ui/skeleton'
import type { RuntimeServices } from '@/app/providers/AppProvider'
import type { ApplicationMetadata, ApplicationSchema } from '@/core/application/types'
import { useApplicationPage, useApplicationSchema } from '@/core/application/queries'
import { RouteResolver } from '@/runtime/navigation/RouteResolver'
import { useCurrentRoute } from '@/runtime/navigation/useCurrentRoute'
import { ApplicationLayout } from '@/composer/layout/ApplicationLayout'
import { PageRenderer } from '@/runtime/page/PageRenderer'

export function ApplicationRuntime({ runtime }: { runtime: RuntimeServices }) {
  const schemaQuery = useApplicationSchema(runtime.applicationApi)

  if (schemaQuery.isPending) return <RuntimeLoading />
  if (schemaQuery.isError) return <RuntimeError error={schemaQuery.error} />

  const application = schemaQuery.data?.data.application
  const schema = schemaQuery.data?.data.schema

  if (!application || !schema) {
    return <RuntimeError error={new Error('Application schema response is incomplete.')} />
  }

  return (
    <ApplicationRuntimeView
      runtime={runtime}
      application={application}
      schema={schema}
    />
  )
}

function ApplicationRuntimeView({
  runtime,
  application,
  schema,
}: {
  runtime: RuntimeServices
  application: ApplicationMetadata
  schema: ApplicationSchema
}) {
  const routeResolver = useMemo(
    () =>
      new RouteResolver({
        applicationPath: application.path,
        rootRoute: schema.root ?? 'dashboard',
      }),
    [application.path, schema.root],
  )

  const route = useCurrentRoute(routeResolver)

  const pageQuery = useApplicationPage(
    runtime.applicationApi,
    route.page,
  )

  return (
    <ApplicationLayout
      application={application}
      schema={schema}
      route={route}
      routeResolver={routeResolver}
      page={pageQuery.data?.data.page ?? null}
    >
      {pageQuery.isPending ? (
        <PageLoading />
      ) : pageQuery.isError ? (
        <RuntimeError error={pageQuery.error} />
      ) : pageQuery.data ? (
        <PageRenderer page={pageQuery.data.data.page} />
      ) : (
        <RuntimeError error={new Error(`Page "${route.page}" was not returned by the backend.`)} />
      )}
    </ApplicationLayout>
  )
}

function RuntimeLoading() {
  return (
    <div className="flex min-h-screen items-center justify-center p-6">
      <Card className="w-full max-w-md">
        <CardHeader>
          <CardTitle>Connecting to QuickCMS</CardTitle>
        </CardHeader>
        <CardContent className="space-y-3">
          <Skeleton className="h-4 w-3/4" />
          <Skeleton className="h-4 w-1/2" />
        </CardContent>
      </Card>
    </div>
  )
}

function PageLoading() {
  return (
    <main className="flex-1 p-6 lg:p-8">
      <div className="mx-auto max-w-7xl space-y-6">
        <Skeleton className="h-4 w-28" />
        <Skeleton className="h-10 w-64" />
        <Skeleton className="h-5 w-96" />
        <Skeleton className="h-72 w-full" />
      </div>
    </main>
  )
}

function RuntimeError({ error }: { error: unknown }) {
  const message = error instanceof Error ? error.message : 'Unknown runtime error.'

  return (
    <div className="flex min-h-screen items-center justify-center p-6">
      <Card className="w-full max-w-xl border-destructive/30">
        <CardHeader>
          <CardTitle>Unable to load QuickCMS</CardTitle>
        </CardHeader>
        <CardContent className="space-y-2 text-sm">
          <p className="text-destructive">{message}</p>
          <p className="text-muted-foreground">
            Check the API URL, application name, and backend CORS configuration.
          </p>
        </CardContent>
      </Card>
    </div>
  )
}
