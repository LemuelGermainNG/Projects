import type { ComponentType, SVGProps } from 'react'

export type ResolvedIcon = ComponentType<
  SVGProps<SVGSVGElement>
>

export interface IconProvider {
  supports(value: string): boolean
  resolve(value: string): ResolvedIcon | null
}

export function toPascalCase(value: string): string {
  return value
    .trim()
    .replace(/^[^a-zA-Z0-9]+/, '')
    .split(/[-_:./\s]+/)
    .filter(Boolean)
    .map(
      (part) =>
        part.charAt(0).toUpperCase() +
        part.slice(1),
    )
    .join('')
}
