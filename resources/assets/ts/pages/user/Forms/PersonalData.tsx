import React, { useState } from "react";
import { Inertia } from "@inertiajs/inertia";
import { usePage } from "@inertiajs/inertia-react";
import { CountryDropdown, RegionDropdown } from "react-country-region-selector";

import LoaderButton from "@/components/LoaderButton";

export default () => {
  const { auth: { user } } = usePage();
  const [sending, setSending] = useState(false);
  const [locations, setLocations] = useState({
    country: user.country,
    state: user.state,
  });
  const [values, setValues] = useState({
    first_name: user.first_name,
    last_name: user.last_name,
    address: user.address,
    city: user.city,
    postal_code: user.postal_code,
  });

  function handleChange(e: React.ChangeEvent<HTMLInputElement | HTMLSelectElement>) {
    const { name, value } = e.target;

    // eslint-disable-next-line no-shadow
    setValues((values) => ({
      ...values,
      [name]: value,
    }));
  }

  function handleChangeLocation(key: string, value: string) {
    // eslint-disable-next-line no-shadow
    setLocations((locations) => ({
      ...locations,
      [key]: value,
    }));
  }

  function handleSubmit(e: React.SyntheticEvent) {
    e.preventDefault();
    setSending(true);
    const data = {
      ...values,
      ...locations,
    };

    Inertia.put('/profile/update', data).then(() => {
      setSending(false);
    });
  }

  return (
    <div className="mt-10 sm:mt-0">
      <div className="md:grid md:grid-cols-3 md:gap-6">
        <div className="md:col-span-1">
          <div className="px-4 sm:px-0">
            <h3 className="text-lg font-medium leading-6 text-gray-900">Informations Personelles</h3>
            <p className="mt-1 text-sm leading-5 text-gray-500">
              Ces informations sont en rapport avec votre compte et permet de facilement vous retrouvez en cas de besoin.
            </p>
          </div>
        </div>
        <div className="mt-5 md:mt-0 md:col-span-2">
          <form onSubmit={handleSubmit}>
            <div className="shadow overflow-hidden rounded-md">
              <div className="px-4 py-5 bg-white sm:p-6">
                <div className="grid grid-cols-6 gap-6">
                  <div className="col-span-6 sm:col-span-3">
                    <label htmlFor="first_name" className="block text-sm font-medium leading-5 text-gray-700">Prénom</label>
                    <input
                      id="first_name"
                      className="mt-2 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-brand focus:border-brand-200 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                      name="first_name"
                      value={values.first_name}
                      onChange={handleChange}
                    />
                  </div>

                  <div className="col-span-6 sm:col-span-3">
                    <label htmlFor="last_name" className="block text-sm font-medium leading-5 text-gray-700">Nom</label>
                    <input
                      id="last_name"
                      className="mt-2 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-brand focus:border-brand-200 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                      name="last_name"
                      value={values.last_name}
                      onChange={handleChange}
                    />
                  </div>

                  <div className="col-span-6">
                    <label htmlFor="email_address" className="block text-sm font-medium leading-5 text-gray-700">Adresse Email</label>
                    <input
                      id="email_address"
                      className="mt-2 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm disabled:bg-gray-100 cursor-not-allowed focus:outline-none focus:shadow-outline-brand focus:border-brand-200 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                      value={user.email}
                      disabled
                    />
                  </div>

                  <div className="col-span-6">
                    <label htmlFor="street_address" className="block text-sm font-medium leading-5 text-gray-700">Adresse complète</label>
                    <input
                      id="street_address"
                      className="mt-2 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-brand focus:border-brand-200 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                      name="address"
                      value={values.address}
                      onChange={handleChange}
                    />
                  </div>

                  <div className="col-span-6">
                    <label htmlFor="country" className="block text-sm font-medium leading-5 text-gray-700">Pays</label>
                    <CountryDropdown
                      value={locations.country}
                      onChange={(val) => handleChangeLocation('country', val)}
                      name="country"
                      classes="mt-2 block form-select w-full py-2 px-3 py-0 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-brand focus:border-brand-200 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                      defaultOptionLabel="Selectionner le pays"
                    />
                  </div>

                  <div className="col-span-6 sm:col-span-3 lg:col-span-2">
                    <label htmlFor="state" className="block text-sm font-medium leading-5 text-gray-700">Etat / Province</label>
                    <RegionDropdown
                      country={locations.country}
                      value={locations.state}
                      name="state"
                      onChange={(val) => handleChangeLocation('state', val)}
                      classes="mt-2 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-brand focus:border-brand-200 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                      defaultOptionLabel="Selectionner"
                    />
                  </div>

                  <div className="col-span-6 sm:col-span-6 lg:col-span-2">
                    <label htmlFor="city" className="block text-sm font-medium leading-5 text-gray-700">Ville</label>
                    <input
                      id="city"
                      className="mt-2 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-brand focus:border-brand-200 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                      name="city"
                      value={values.city}
                      onChange={handleChange}
                    />
                  </div>

                  <div className="col-span-6 sm:col-span-3 lg:col-span-2">
                    <label htmlFor="postal_code" className="block text-sm font-medium leading-5 text-gray-700">ZIP / Postal</label>
                    <input
                      id="postal_code"
                      className="mt-2 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-brand focus:border-brand-200 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                      name="postal_code"
                      value={values.postal_code}
                      onChange={handleChange}
                    />
                  </div>
                </div>
              </div>
              <div className="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <span className="inline-flex rounded-md shadow-sm">
                  <LoaderButton
                    title="Enrégistrer"
                    type="submit"
                    loading={sending}
                    className="text-sm"
                  />
                </span>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  );
};
