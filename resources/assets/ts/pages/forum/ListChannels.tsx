import * as React from "react";
import { usePage } from "@inertiajs/inertia-react";

import Category from "@/components/forum/Category";

export default () => {
  const { channels } = usePage();
  return (
    <div className="hidden lg:flex justify-between mb-12">
      {
        channels.map((channel: { id: number; name: string; slug: string }) => (
          <Category key={channel.id} slug={channel.slug} name={channel.name} />
        ))
      }
    </div>
  );
};
