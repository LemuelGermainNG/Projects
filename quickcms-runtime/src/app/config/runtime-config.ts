export interface RuntimeConfig {
  apiUrl: string
  application: string
}

function readMeta(name: string): string | null {
  return document
    .querySelector(`meta[name="${name}"]`)
    ?.getAttribute('content')
    ?.trim() || null
}

export function getRuntimeConfig(): RuntimeConfig {
  const apiUrl = readMeta('quickcms-api-url')
  const application = readMeta('quickcms-application')

  if (!apiUrl) {
    throw new Error('Missing meta[name="quickcms-api-url"].')
  }

  if (!application) {
    throw new Error('Missing meta[name="quickcms-application"].')
  }

  return {
    apiUrl: apiUrl.replace(/\\/$/, ''),
    application,
  }
}
