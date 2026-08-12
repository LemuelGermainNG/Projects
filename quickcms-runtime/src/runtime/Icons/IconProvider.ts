import type {
  ComponentType,
} from 'react'

export type IconComponent =
  ComponentType<{
    className?: string
    size?: number | string
    strokeWidth?: number
  }>

export interface IconProvider {
  /**
   * Unique provider identifier.
   *
   * Examples:
   * heroicon
   * lucide
   */
  readonly name: string

  /**
   * Check whether this provider
   * can resolve the requested icon.
   */
  supports(
    icon: string,
  ): boolean

  /**
   * Resolve an icon name into
   * a React component.
   */
  resolve(
    icon: string,
  ): IconComponent | null
}