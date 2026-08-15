import type { ComponentType } from 'react'
import type { SchemaNode, SchemaRendererProps } from '@/runtime/contracts/schema'

export type RegisteredSchemaRenderer<TSchema extends SchemaNode = SchemaNode> =
  ComponentType<SchemaRendererProps<TSchema>>

/**
 * Maps backend schema types to React renderers.
 *
 * The registry is deliberately independent from React UI components such as
 * shadcn. Composer packages register their renderers during application
 * bootstrap.
 */
export class SchemaRegistry {
  private readonly renderers = new Map<string, RegisteredSchemaRenderer>()

  register<TSchema extends SchemaNode>(
    type: string,
    renderer: RegisteredSchemaRenderer<TSchema>,
  ): this {
    const key = this.normalizeType(type)

    if (!key) {
      throw new Error('Cannot register a schema renderer with an empty type.')
    }

    this.renderers.set(key, renderer as RegisteredSchemaRenderer)

    return this
  }

  registerMany(
    renderers: Record<string, RegisteredSchemaRenderer>,
  ): this {
    Object.entries(renderers).forEach(([type, renderer]) => {
      this.register(type, renderer)
    })

    return this
  }

  resolve(type: string): RegisteredSchemaRenderer | undefined {
    return this.renderers.get(this.normalizeType(type))
  }

  has(type: string): boolean {
    return this.renderers.has(this.normalizeType(type))
  }

  unregister(type: string): boolean {
    return this.renderers.delete(this.normalizeType(type))
  }

  clear(): void {
    this.renderers.clear()
  }

  types(): string[] {
    return [...this.renderers.keys()]
  }

  private normalizeType(type: string): string {
    return type.trim().toLowerCase()
  }
}

export const schemaRegistry = new SchemaRegistry()
