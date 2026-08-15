import type { ApplicationLayoutProps } from '@/runtime/contracts/layout'

export function SimpleLayout({ application, children }: ApplicationLayoutProps) {
  const title = application.title ?? application.name ?? 'Application'

  return (
    <div className="min-h-screen bg-background text-foreground">
      <main className="mx-auto min-h-screen w-full max-w-7xl px-6 py-8">
        <div className="mb-6 text-sm font-medium text-muted-foreground">{title}</div>
        {children}
      </main>
    </div>
  )
}
