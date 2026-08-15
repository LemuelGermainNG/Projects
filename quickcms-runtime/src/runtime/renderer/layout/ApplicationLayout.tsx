import type { ApplicationLayoutProps, ApplicationLayoutType } from '@/runtime/contracts/layout'
import { layoutRegistry } from './LayoutRegistry'

function resolveLayoutType(
  layout: ApplicationLayoutProps['application']['layout'],
): ApplicationLayoutType {
  if (typeof layout === 'string' && layout.trim()) {
    return layout
  }

  if (layout && typeof layout === 'object' && typeof layout.type === 'string' && layout.type.trim()) {
    return layout.type
  }

  return 'sidebar'
}

export function ApplicationLayout(props: ApplicationLayoutProps) {
  const type = resolveLayoutType(props.application.layout)
  const Renderer = layoutRegistry.resolve(type) ?? layoutRegistry.resolve('default')

  if (!Renderer) {
    return (
      <div className="min-h-screen bg-background p-6 text-foreground">
        <div className="rounded-lg border border-destructive/30 bg-destructive/5 p-4 text-sm">
          <p className="font-medium text-destructive">Unsupported application layout</p>
          <p className="mt-1 text-muted-foreground">
            No renderer is registered for <code className="rounded bg-muted px-1 py-0.5">{type}</code>.
          </p>
        </div>
      </div>
    )
  }

  return <Renderer {...props} />
}
