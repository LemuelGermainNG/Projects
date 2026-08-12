import {
  Circle,
} from 'lucide-react'

import type {
  IconComponent,
  IconProvider,
} from './IconProvider'

import {
  HeroiconsIconProvider,
} from './providers/HeroiconsIconProvider'

import {
  LucideIconProvider,
} from './providers/LucideIconProvider'

export class IconResolver {
  private readonly providers: IconProvider[]

  constructor(
    providers: IconProvider[] = [],
  ) {
    this.providers = [
      ...providers,
    ]
  }

  /**
   * Resolve an icon using the
   * registered providers.
   */
  resolve(
    icon: string | null,
  ): IconComponent {
    if (!icon) {
      return Circle
    }

    for (
      const provider of this.providers
    ) {
      if (
        !provider.supports(icon)
      ) {
        continue
      }

      const resolved =
        provider.resolve(icon)

      if (resolved) {
        return resolved
      }
    }

    return Circle
  }
}

/**
 * Default Runtime icon resolver.
 *
 * Provider order matters.
 */
export const iconResolver =
  new IconResolver([
    new HeroiconsIconProvider(),
    new LucideIconProvider(),
  ])