import type { ComponentType } from 'react'
import type { ApplicationLayoutProps, ApplicationLayoutType } from '@/runtime/contracts/layout'

export type ApplicationLayoutRenderer = ComponentType<ApplicationLayoutProps>

export class LayoutRegistry {
  private readonly renderers = new Map<string, ApplicationLayoutRenderer>()

  register(type: ApplicationLayoutType, renderer: ApplicationLayoutRenderer): this {
    const key = this.normalize(type)

    if (!key) {
      throw new Error('Cannot register an application layout with an empty type.')
    }

    this.renderers.set(key, renderer)
    return this
  }

  registerMany(renderers: Record<string, ApplicationLayoutRenderer>): this {
    Object.entries(renderers).forEach(([type, renderer]) => this.register(type, renderer))
    return this
  }

  resolve(type: ApplicationLayoutType): ApplicationLayoutRenderer | undefined {
    return this.renderers.get(this.normalize(type))
  }

  has(type: ApplicationLayoutType): boolean {
    return this.renderers.has(this.normalize(type))
  }

  types(): string[] {
    return [...this.renderers.keys()]
  }

  private normalize(type: ApplicationLayoutType): string {
    return String(type).trim().toLowerCase()
  }
}

export const layoutRegistry = new LayoutRegistry()
