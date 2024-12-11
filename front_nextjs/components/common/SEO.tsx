import { SEO } from "@/types";
import Head from "next/head";

interface Props {
  title: string;
  description?: string;
  openGraph?: SEO["openGraph"];
}

export default function SEO({ title, description, openGraph }: Props) {
  const siteTitle = "Mon Site WordPress";

  return (
    <Head>
      <title>{`${title} | ${siteTitle}`}</title>
      {description && <meta name="description" content={description} />}

      <meta property="og:site_name" content={siteTitle} />
      <meta property="og:title" content={openGraph?.title || title} />
      {openGraph?.description && (
        <meta property="og:description" content={openGraph.description} />
      )}
      {openGraph?.image && (
        <meta property="og:image" content={openGraph.image} />
      )}

      <meta name="twitter:card" content="summary_large_image" />
      <meta name="twitter:title" content={title} />
      {description && <meta name="twitter:description" content={description} />}
      {openGraph?.image && (
        <meta name="twitter:image" content={openGraph.image} />
      )}
    </Head>
  );
}
