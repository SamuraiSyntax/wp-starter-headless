export interface Post {
  id: number;
  title: string;
  content: string;
  excerpt: string;
  slug: string;
  date: string;
  modified: string;
  featured_image?: string;
  categories?: Category[];
  author?: Author;
}

export interface Category {
  id: number;
  name: string;
  slug: string;
}

export interface Author {
  id: number;
  name: string;
  avatar?: string;
}

export interface Menu {
  id: number;
  name: string;
  items: MenuItem[];
}

export interface MenuItem {
  id: number;
  title: string;
  url: string;
  children?: MenuItem[];
}

export interface SEO {
  title: string;
  description?: string;
  openGraph?: {
    title: string;
    description: string;
    image?: string;
  };
}
