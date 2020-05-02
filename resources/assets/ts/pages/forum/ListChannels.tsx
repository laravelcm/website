import * as React from "react";
import { usePage } from "@inertiajs/inertia-react";

import { ChannelType } from "@/utils/types";
import Category from "@/components/forum/Category";

export default () => {
  const { channels } = usePage();
  return (
    <div className="hidden lg:flex justify-between mb-12">
      {
        channels.map((channel: ChannelType) => (
          <Category key={channel.id} slug={channel.slug} name={channel.name} />
        ))
      }
    </div>
  );
};
