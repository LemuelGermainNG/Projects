import type { ReactNode } from 'react'
import type { SchemaNode } from '@/runtime/contracts/schema'
import { schemaRegistry } from './SchemaRegistry'

export interface SchemaRendererProps {
  schema: SchemaNode | null | undefined
  fallback?: ReactNode
}

export function SchemaRenderer({
  schema,
  fallback = null,
}: SchemaRendererProps) {
  if (schema == null) {
    return <>{fallback}</>
  }

  if (!isSchemaNode(schema)) {
    return <SchemaRendererError message="Invalid schema: expected an object with a type." />
  }

  const Renderer = schemaRegistry.resolve(schema.type)

  if (!Renderer) {
    return <UnsupportedSchema type={schema.type} />
  }

  return <Renderer schema={schema} />
}

function UnsupportedSchema({ type }: { type: string }) {
  return (
    <div className="rounded-lg border border-dashed border-muted-foreground/30 bg-muted/30 p-4">
      <p className="text-sm font-medium">Unsupported schema</p>
      <p className="mt-1 text-sm text-muted-foreground">
        No renderer is registered for <code className="rounded bg-muted px-1 py-0.5">{type}</code>.
      </p>
    </div>
  )
}

function SchemaRendererError({ message }: { message: string }) {
  return (
    <div className="rounded-lg border border-destructive/30 bg-destructive/5 p-4 text-sm text-destructive">
      {message}
    </div>
  )
}

function isSchemaNode(value: unknown): value is SchemaNode {
  return (
    typeof value === 'object' &&
    value !== null &&
    'type' in value &&
    typeof value.type === 'string' &&
    value.type.trim().length > 0
  )
}
