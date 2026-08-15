export interface RuntimeConfig {
  apiUrl: string
  application: string
}

function readMeta(name: string): string | null {
  return document.querySelector(`meta[name="${name}"]`)?.getAttribute('content') ?? null
}

function normalizeApiUrl(value: string): string {
  return value.trim().replace(/\/+$/, '')
}

export function getRuntimeConfig(): RuntimeConfig {
  const apiUrl = readMeta('quickcms-api-url')
  const application = readMeta('quickcms-application')

  if (!apiUrl) {
    throw new Error('Missing <meta name="quickcms-api-url"> in index.html.')
  }

  if (!application) {
    throw new Error('Missing <meta name="quickcms-application"> in index.html.')
  }

  return { apiUrl: normalizeApiUrl(apiUrl), application: application.trim() }
}
