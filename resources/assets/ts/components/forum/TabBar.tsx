import React, { useState } from "react";
import { usePage } from "@inertiajs/inertia-react";

import { ChannelType } from "@/utils/types";
import { navigate } from "@/utils/helpers";

export default () => {
  const { channels } = usePage();
  const [selected, setSelected] = useState('');
  function handleChange(e: React.ChangeEvent<HTMLSelectElement>) {
    const { value } = e.target;
    setSelected(value);
    if (value === 'tous') {
      navigate(e, `/forum`);
    } else {
      navigate(e, `/forum/channels/${value}`);
    }
  }

  return (
    <>
      <div className="inline-block relative lg:hidden mr-4">
        <select className="block appearance-none w-full text-sm bg-gray-100 border border-gray-300 pl-4 py-3 pr-6 rounded-full leading-tight focus:outline-none">
          <option value="Sujets récents">Sujets récents</option>
          <option>Populaire cette semaine</option>
          <option>Populaire en tout temps</option>
          <option>Résolus</option>
          <option>Non résolus</option>
          <option>Aucune réponse</option>
        </select>
        <div className="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg
            className="fill-current h-4 w-4"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
          >
            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
          </svg>
        </div>
      </div>
      <div className="inline-block relative lg:hidden">
        <select
          className="block appearance-none w-full text-sm bg-gray-100 border border-gray-300 px-4 py-3 pr-8 rounded-full leading-tight focus:outline-none"
          onChange={handleChange}
          value={selected}
        >
          <option value="tous">Tous</option>
          {
            channels.map((channel: ChannelType) => (
              <option key={channel.id} value={channel.slug}>
                {channel.name}
              </option>
            ))
          }
        </select>
        <div className="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg
            className="fill-current h-4 w-4"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
          >
            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
          </svg>
        </div>
      </div>
    </>
  );
};
