import React from "react";
import { InertiaLink } from "@inertiajs/inertia-react";

import { PostType } from "@/utils/types";

interface Props {
  post: PostType;
}

export default ({ post }: Props) => (
  <div className="w-full md:w-1/2 md:mb-5 lg:w-1/4 lg:mb-6 md:px-4">
    <InertiaLink className="block rounded-lg bg-white h-56 shadow-md hover:shadow-lg" href={`/blog/${post.slug}`}>
      <img src={post.image} className="object-fill w-full h-45 rounded-t-lg" alt={post.title} />
      <div className="py-3 px-2">
        <h4 className="text-sm text-gray-700 font-medium text-truncate">{post.title}</h4>
      </div>
    </InertiaLink>
  </div>
);
