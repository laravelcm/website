import React, { useState, useCallback } from "react";
import { Inertia } from "@inertiajs/inertia";
import { usePage } from "@inertiajs/inertia-react";
import classNames from "classnames";
import { useDropzone } from "react-dropzone";

import LoaderButton from "@/components/LoaderButton";

export default () => {
  const { auth: { user }, errors } = usePage();
  const [sending, setSending] = useState(false);
  const [picture, setPicture] = useState(user.picture);
  const [values, setValues] = useState({
    username: user.username,
    biography: user.biography,
  });
  const onDrop = useCallback((acceptedFiles) => {
    const selectFile = acceptedFiles[0];
    setPicture(URL.createObjectURL(selectFile));

    // Upload file to the server.
    const formData = new FormData();
    formData.append('avatar_location', selectFile);
    Inertia.post(`/profile/avatar`, formData);
  }, []);
  const inputClass = classNames('form-input flex-1 block w-full focus:shadow-outline-brand focus:border-brand-200 rounded-none rounded-r-md transition duration-150 ease-in-out sm:text-sm sm:leading-5', {
    'border-red-200': errors.username,
  });
  const { getRootProps, getInputProps } = useDropzone({
    onDrop,
    accept: 'image/jpeg, image/png, image/jpg',
    maxSize: 1024 * 1500,
    multiple: false,
  });

  function handleChange(e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement>) {
    const { name, value } = e.target;

    // eslint-disable-next-line no-shadow
    setValues((values) => ({
      ...values,
      [name]: value,
    }));
  }

  function handleSubmit(e: React.SyntheticEvent) {
    e.preventDefault();
    setSending(true);
    Inertia.put('/profile/profile', values).then(() => {
      setSending(false);
    });
  }

  return (
    <div>
      <div className="md:grid md:grid-cols-3 md:gap-6">
        <div className="md:col-span-1">
          <div className="px-4 sm:px-0">
            <h3 className="text-lg font-medium leading-6 text-gray-900">Profil</h3>
            <p className="mt-1 text-sm leading-5 text-gray-500">
              Ces informations seront affichées publiquement, alors faites attention à ce que vous partagez.
            </p>
          </div>
        </div>
        <div className="mt-5 md:mt-0 md:col-span-2">
          <form onSubmit={handleSubmit}>
            <div className="shadow sm:rounded-md sm:overflow-hidden">
              <div className="px-4 py-5 bg-white sm:p-6">
                <div>
                  <label htmlFor="photo" className="block text-sm leading-5 font-medium text-gray-700">Photo</label>
                  <div className="mt-2 flex items-center">
                    <span className="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                      <img className="h-full w-full rounded-full" src={picture} alt={user.full_name} />
                    </span>
                    <div {...getRootProps()}>
                      <input {...getInputProps()} multiple={false} />
                      <button
                        type="button"
                        className="ml-5 rounded-md shadow-sm py-2 px-3 border border-gray-300 rounded-md text-sm leading-4 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-brand-200 focus:shadow-outline-brand active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out"
                      >
                        Changer
                      </button>
                    </div>
                  </div>
                </div>

                <div className="grid grid-cols-3 gap-6 mt-6">
                  <div className="col-span-3">
                    <label htmlFor="username" className="block text-sm font-medium leading-5 text-gray-700">Pseudo (Nom d'utilisateur)</label>
                    <div className="mt-2 flex w-full rounded-md shadow-sm relative">
                      <span className="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                        laravelcm.com/u/@
                      </span>
                      <input
                        id="username"
                        className={inputClass}
                        name="username"
                        value={values.username}
                        onChange={handleChange}
                      />
                      {errors.username && (
                        <div className="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                          <svg className="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fillRule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clipRule="evenodd" />
                          </svg>
                        </div>
                      )}
                    </div>
                    {errors.username && <p className="mt-2 text-sm text-red-600">{errors.username[0]}</p>}
                  </div>
                </div>

                <div className="mt-6">
                  <label htmlFor="about" className="block text-sm leading-5 font-medium text-gray-700">Bio</label>
                  <div className="mt-2 rounded-md shadow-sm">
                    <textarea
                      id="about"
                      rows={3}
                      className="form-textarea mt-1 block w-full focus:shadow-outline-brand focus:border-brand-200 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                      placeholder="Quelques mots sur vous..."
                      value={values.biography}
                      onChange={handleChange}
                      name="biography"
                    />
                  </div>
                  <p className="mt-2 text-sm text-gray-500">Brève description de votre profil. Les URL sont liées par un lien hypertexte.</p>
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
