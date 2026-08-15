import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card'
import type { PageSchema } from '@/core/application/types'

export function PageRenderer({ page }: { page: PageSchema }) {
  const header = page.header
  const content = page.content

  return (
    <main className="flex-1 overflow-auto">
      <div className="mx-auto w-full max-w-7xl space-y-6 p-6 lg:p-8">
        <header className="space-y-1">
          <p className="text-sm text-muted-foreground">{page.type}</p>
          <h1 className="text-3xl font-semibold tracking-tight">{header?.title ?? 'Untitled page'}</h1>
          {header?.description ? <p className="text-muted-foreground">{header.description}</p> : null}
        </header>

        <Card>
          <CardHeader><CardTitle>Backend page schema</CardTitle></CardHeader>
          <CardContent className="space-y-4">
            <div className="grid gap-4 sm:grid-cols-3">
              <Info label="Page type" value={page.type} />
              <Info label="Content type" value={String(content?.type ?? 'none')} />
              <Info label="Runtime" value="Connected" />
            </div>
            <pre className="max-h-[520px] overflow-auto rounded-lg bg-muted p-4 text-xs leading-5">
              {JSON.stringify(page, null, 2)}
            </pre>
          </CardContent>
        </Card>
      </div>
    </main>
  )
}

function Info({ label, value }: { label: string; value: string }) {
  return <div className="rounded-lg border bg-card p-4"><p className="text-xs text-muted-foreground">{label}</p><p className="mt-1 font-medium">{value}</p></div>
}
