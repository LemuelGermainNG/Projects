import { useApplicationSchema } from '@/runtime/Hooks/useApplicationSchema'
import { ApplicationRenderer } from '@/runtime/Renderer/ApplicationRenderer'
import { useRuntime } from '@/app/providers/RuntimeProvider'

function App() {
  const runtime = useRuntime()
  const query = useApplicationSchema(
    runtime.applicationApi,
    runtime.application,
  )

  if (query.isPending) {
    return (
      <main className="flex min-h-screen items-center justify-center bg-background">
        <p className="text-sm text-muted-foreground">Loading application…</p>
      </main>
    )
  }

  if (query.isError) {
    return (
      <main className="flex min-h-screen items-center justify-center bg-background p-6">
        <div className="max-w-lg rounded-xl border border-destructive/30 bg-card p-6">
          <h1 className="text-lg font-semibold">Unable to load application</h1>
          <p className="mt-2 text-sm text-muted-foreground">
            {query.error instanceof Error
              ? query.error.message
              : 'An unexpected error occurred.'}
          </p>
        </div>
      </main>
    )
  }

  return <ApplicationRenderer document={query.data} />
}

export default App
