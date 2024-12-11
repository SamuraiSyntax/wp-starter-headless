import SEO from "@/components/common/SEO";
import Layout from "@/components/layout/Layout";
import PostList from "@/components/posts/PostList";
import { getPosts } from "@/lib/api";
import { Post } from "@/types";
import { GetStaticProps } from "next";

interface Props {
  posts: Post[];
}

export default function HomePage({ posts }: Props) {
  return (
    <Layout>
      <SEO title="Accueil" description="Découvrez nos derniers articles" />
      <div className="container mx-auto px-4 py-8">
        <h1 className="text-4xl font-bold mb-8">Derniers articles</h1>
        <PostList posts={posts} />
      </div>
    </Layout>
  );
}

export const getStaticProps: GetStaticProps = async () => {
  const posts = await getPosts();

  return {
    props: {
      posts,
    },
    revalidate: 60,
  };
};
