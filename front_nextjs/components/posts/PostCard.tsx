import { Post } from "@/types";
import { formatDate } from "@/utils/helpers";
import Image from "next/image";
import Link from "next/link";

interface Props {
  post: Post;
}

export default function PostCard({ post }: Props) {
  return (
    <article className="bg-white rounded-lg shadow-md overflow-hidden">
      {post.featured_image && (
        <div className="relative h-48">
          <Image
            src={post.featured_image}
            alt={post.title}
            layout="fill"
            objectFit="cover"
          />
        </div>
      )}
      <div className="p-6">
        <h2 className="text-2xl font-bold mb-2">
          <Link href={`/posts/${post.slug}`}>
            <a className="hover:text-blue-600 transition-colors">
              {post.title}
            </a>
          </Link>
        </h2>
        <div className="text-gray-600 mb-4">{formatDate(post.date)}</div>
        <div
          className="text-gray-700 mb-4"
          dangerouslySetInnerHTML={{ __html: post.excerpt }}
        />
        <Link href={`/posts/${post.slug}`}>
          <a className="text-blue-600 hover:text-blue-800 font-semibold">
            Lire la suite →
          </a>
        </Link>
      </div>
    </article>
  );
}
