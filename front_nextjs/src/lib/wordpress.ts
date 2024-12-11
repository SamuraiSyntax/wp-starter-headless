export const WORDPRESS_API_URL =
  process.env.NEXT_PUBLIC_WORDPRESS_API_URL || "http://localhost:8080";

export interface WordPressPost {
  id: number;
  title: string;
  content: string;
  excerpt: string;
  slug: string;
  date: string;
  modified: string;
  featured_image?: string;
}

export async function fetchAPI(endpoint: string, options = {}) {
  const headers = { "Content-Type": "application/json" };
  const res = await fetch(
    `${WORDPRESS_API_URL}/wp-json/wp-headless/v1${endpoint}`,
    {
      headers,
      ...options,
    }
  );

  if (!res.ok) {
    throw new Error(`API error: ${res.status}`);
  }

  const json = await res.json();
  return json;
}

export async function getAllPosts(): Promise<WordPressPost[]> {
  const posts = await fetchAPI("/posts");
  return posts;
}

export async function getPostBySlug(slug: string): Promise<WordPressPost> {
  const posts = await fetchAPI(`/posts?slug=${slug}`);
  return posts[0];
}

export async function getPreviewPost(
  id: number,
  token: string
): Promise<WordPressPost> {
  const data = await fetchAPI(`/preview/verify?id=${id}&token=${token}`);
  return data;
}
