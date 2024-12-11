import { getPreviewPost } from "@/lib/wordpress";
import { NextApiRequest, NextApiResponse } from "next";

export default async function preview(
  req: NextApiRequest,
  res: NextApiResponse
) {
  const { slug, id, token } = req.query;

  if (!id || !token || typeof id !== "string") {
    return res.status(401).json({ message: "Invalid token" });
  }

  try {
    const post = await getPreviewPost(parseInt(id), token as string);

    if (!post) {
      return res.status(401).json({ message: "Invalid post" });
    }

    res.setPreviewData({
      post: post,
      token: token,
    });

    res.redirect(`/preview/${post.slug}`);
  } catch (error) {
    return res.status(401).json({ message: "Error fetching preview" });
  }
}
