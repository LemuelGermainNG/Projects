import { Circle } from 'lucide-react'
import type { IconProvider, ResolvedIcon } from './types'
import { FontAwesomeProvider } from './providers/FontAwesomeProvider'
import { HeroiconsProvider } from './providers/HeroiconsProvider'
import { LucideProvider } from './providers/LucideProvider'
import { TablerProvider } from './providers/TablerProvider'

const providers: IconProvider[] = [
  HeroiconsProvider,
  FontAwesomeProvider,
  TablerProvider,
  LucideProvider,
]

/**
 * Resolve an icon name emitted by the QuickCMS backend.
 *
 * Supported examples:
 * - heroicon-o-home
 * - heroicon-s-home
 * - lucide-settings
 * - tabler-users
 * - fa-house
 * - fas-house
 * - far-star
 * - fab-github
 * - fontawesome-solid-house
 * - fontawesome-regular-star
 * - fontawesome-brands-github
 */
export function resolveIcon(
  value: string | null | undefined,
): ResolvedIcon {
  if (!value?.trim()) {
    return Circle
  }

  const normalized =
    value.trim().toLowerCase()

  for (const provider of providers) {
    if (!provider.supports(normalized)) {
      continue
    }

    const icon =
      provider.resolve(normalized)

    if (icon) {
      return icon
    }
  }

  return Circle
}

export function getIconProviders(): readonly IconProvider[] {
  return providers
}
