import PreviewBanner from "@/components/common/PreviewBanner";
import Layout from "@/components/layout/Layout";
import { WordPressPost } from "@/lib/wordpress";
import { GetStaticProps } from "next";
import { useRouter } from "next/router";

interface Props {
  preview: boolean;
  post: WordPressPost;
}

export default function PreviewPage({ preview, post }: Props) {
  const router = useRouter();

  if (router.isFallback) {
    return <div>Loading...</div>;
  }

  return (
    <Layout>
      {preview && <PreviewBanner />}
      <article className="container mx-auto px-4 py-8">
        <h1 className="text-4xl font-bold mb-4">{post.title}</h1>
        <div
          className="prose max-w-none"
          dangerouslySetInnerHTML={{ __html: post.content }}
        />
      </article>
    </Layout>
  );
}

export const getStaticProps: GetStaticProps = async ({
  params,
  preview,
  previewData,
}) => {
  if (preview && previewData) {
    return {
      props: {
        preview: true,
        post: previewData.post,
      },
    };
  }

  return {
    notFound: true,
  };
};

export const getStaticPaths = () => {
  return {
    paths: [],
    fallback: true,
  };
};
