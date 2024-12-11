import SEO from "@/components/common/SEO";
import Layout from "@/components/layout/Layout";
import PostContent from "@/components/posts/PostContent";
import { getPost, getPosts } from "@/lib/api";
import { Post } from "@/types";
import { GetStaticPaths, GetStaticProps } from "next";
import { useRouter } from "next/router";

interface Props {
  post: Post;
}

export default function PostPage({ post }: Props) {
  const router = useRouter();

  if (router.isFallback) {
    return <div>Chargement...</div>;
  }

  return (
    <Layout>
      <SEO
        title={post.title}
        description={post.excerpt}
        openGraph={{
          title: post.title,
          description: post.excerpt,
          image: post.featured_image,
        }}
      />
      <PostContent post={post} />
    </Layout>
  );
}

export const getStaticPaths: GetStaticPaths = async () => {
  const posts = await getPosts();

  return {
    paths: posts.map((post) => ({
      params: { slug: post.slug },
    })),
    fallback: true,
  };
};

export const getStaticProps: GetStaticProps = async ({ params }) => {
  const post = await getPost(params?.slug as string);

  if (!post) {
    return {
      notFound: true,
    };
  }

  return {
    props: {
      post,
    },
    revalidate: 60,
  };
};
