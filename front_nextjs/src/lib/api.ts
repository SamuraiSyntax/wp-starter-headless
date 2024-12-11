import { Menu, Post } from "@/types";

const API_URL = process.env.NEXT_PUBLIC_WORDPRESS_API_URL;

async function fetchAPI(endpoint: string, options = {}) {
  const defaultOptions = {
    headers: {
      "Content-Type": "application/json",
    },
  };

  const mergedOptions = {
    ...defaultOptions,
    ...options,
  };

  const res = await fetch(
    `${API_URL}/wp-json/wp-headless/v1${endpoint}`,
    mergedOptions
  );

  if (!res.ok) {
    throw new Error(`API Error: ${res.status}`);
  }

  return res.json();
}

export async function getPosts(page = 1): Promise<Post[]> {
  return fetchAPI(`/posts?page=${page}`);
}

export async function getPost(slug: string): Promise<Post> {
  const posts = await fetchAPI(`/posts?slug=${slug}`);
  return posts[0];
}

export async function getMenu(location: string): Promise<Menu> {
  return fetchAPI(`/menus/${location}`);
}

export async function getPreviewPost(id: string, token: string): Promise<Post> {
  return fetchAPI(`/preview/verify?id=${id}&token=${token}`);
}

export async function getCategories() {
  return fetchAPI("/categories");
}

export async function getPostsByCategory(categoryId: number, page = 1) {
  return fetchAPI(`/posts?category=${categoryId}&page=${page}`);
}

export async function searchPosts(query: string) {
  return fetchAPI(`/search?s=${encodeURIComponent(query)}`);
}
