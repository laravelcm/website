import React, { useState } from "react";
import { usePage } from "@inertiajs/inertia-react";

import { ChannelType } from "@/utils/types";
import { navigate } from "@/utils/helpers";

export default () => {
  const { channels } = usePage();
  const [selected, setSelected] = useState("");
  function handleChange(e: React.ChangeEvent<HTMLSelectElement>) {
    const { value } = e.target;
    setSelected(value);
    if (value === "tous") {
      navigate(e, `/forum`);
    } else {
      navigate(e, `/forum/channels/${value}`);
    }
  }

  return (
    <div className="flex items-center grid grid-cols-1 gap-4 w-full">
      <div className="relative inline-block lg:hidden">
        <select
          className="form-select block w-full pl-3 pr-10 py-2 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-brand focus:border-brand-200 sm:text-sm sm:leading-5 transition ease-in-out duration-150"
          value={selected}
          onChange={handleChange}
        >
          <option value="tous">Tous</option>
          {channels.map((channel: ChannelType) => (
            <option key={channel.id} value={channel.slug}>
              {channel.name}
            </option>
          ))}
        </select>
      </div>
    </div>
  );
};
