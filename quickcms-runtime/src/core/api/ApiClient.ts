export class ApiError extends Error {
  constructor(
    message: string,
    public readonly status: number,
    public readonly payload: unknown = null,
  ) {
    super(message)
    this.name = 'ApiError'
  }
}

export interface ApiClientOptions {
  baseUrl: string
}

export class ApiClient {
  private readonly baseUrl: string

  constructor(options: ApiClientOptions) {
    this.baseUrl = options.baseUrl.replace(/\/+$/, '')
  }

  async get<T>(path: string): Promise<T> {
    const url = this.resolveUrl(path)
    const response = await fetch(url, {
      method: 'GET',
      headers: { Accept: 'application/json' },
      // Keep credentials disabled until an authentication strategy is defined.
      // This also works with a Laravel CORS policy using Access-Control-Allow-Origin: *.
      credentials: 'omit',
    })

    const payload = await this.readPayload(response)

    if (!response.ok) {
      const message =
        typeof payload === 'object' && payload !== null && 'message' in payload
          ? String((payload as { message?: unknown }).message)
          : `Request failed with status ${response.status}.`
      throw new ApiError(message, response.status, payload)
    }

    return payload as T
  }

  private resolveUrl(path: string): string {
    if (/^https?:\/\//i.test(path)) return path
    const normalizedPath = path.startsWith('/') ? path : `/${path}`
    return `${this.baseUrl}${normalizedPath}`
  }

  private async readPayload(response: Response): Promise<unknown> {
    const text = await response.text()
    if (!text) return null
    try {
      return JSON.parse(text)
    } catch {
      return text
    }
  }
}
