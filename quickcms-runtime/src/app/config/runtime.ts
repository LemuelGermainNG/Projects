export interface RuntimeConfig {
  apiUrl: string
  application: string
}

function getMetaContent(name: string): string | null {
  const element = document.querySelector<HTMLMetaElement>(
    `meta[name="${name}"]`,
  )

  return element?.content?.trim() || null
}

function getRequiredMeta(name: string): string {
  const value = getMetaContent(name)

  if (!value) {
    throw new Error(
      `Missing required meta tag: <meta name="${name}" ...>`,
    )
  }

  return value
}

function normalizeApiUrl(url: string): string {
  return url.replace(/\/+$/, '')
}

export function createRuntimeConfig(): RuntimeConfig {
  return {
    apiUrl: normalizeApiUrl(
      getRequiredMeta('quickcms-api-url'),
    ),

    application: getRequiredMeta(
      'quickcms-application',
    ),
  }
}

export const runtimeConfig = createRuntimeConfig()