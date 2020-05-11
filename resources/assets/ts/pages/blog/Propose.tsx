import React, { useEffect, useState } from "react";
import { usePage } from "@inertiajs/inertia-react";
import { Inertia } from "@inertiajs/inertia";
import ReactMde, { commands } from "react-mde";
import * as Showdown from "showdown";
import hljs from "highlight.js";

import Layout from "@/includes/Layout";
import Seo from "@/includes/Seo";
import Breadcrumb from "@/includes/Breadcrumb";
import TextInput from "@/components/TextInput";
import { CategoryType } from "@/utils/types";
import SelectInput from "@/components/SelectInput";
import LoaderButton from "@/components/LoaderButton";

const Propose = () => {
  const {
    categories,
    post,
    errors,
    isCreated,
    auth: { user },
  } = usePage();
  const [body, setBody] = useState("");
  const [selectedTab, setSelectedTab] = useState<"write" | "preview">("write");
  const [sending, setSending] = useState(false);
  const [values, setValues] = useState({
    title: "",
    category_id: "",
  });

  useEffect(() => {
    updateCodeSyntaxHighlighting();

    if (!isCreated) {
      // eslint-disable-next-line no-shadow
      setValues((values) => ({
        ...values,
        title: post.title,
        category_id: post.category_id,
      }));

      setBody(post.body);
    }
  }, []);

  function updateCodeSyntaxHighlighting() {
    document.querySelectorAll("pre code").forEach((block) => {
      hljs.highlightBlock(block);
    });
  }

  const converter = new Showdown.Converter({
    tables: true,
    simplifiedAutoLink: true,
    strikethrough: true,
    tasklists: true,
  });

  const listCommands = [
    {
      commands: [
        commands.linkCommand,
        commands.codeCommand,
        commands.imageCommand,
      ],
    },
  ];

  function handleChange(e: React.ChangeEvent<HTMLInputElement | HTMLSelectElement>) {
    const { name, value } = e.target;

    // eslint-disable-next-line no-shadow
    setValues((values) => ({
      ...values,
      [name]: value,
    }));
  }

  function store(e: React.SyntheticEvent) {
    e.preventDefault();
    setSending(true);

    const form = {
      ...values,
      body,
    };

    if (isCreated) {
      Inertia.post(`/publishing/propose`, form).then(() => {
        setSending(false);
      }).catch((error) => {
        console.error(error);
      });
    } else {
      Inertia.put(`/publishing/propose/${post.id}`, form).then(() => {
        setSending(false);
      }).catch((error) => {
        console.error(error);
      });
    }
  }

  return (
    <>
      <Seo
        title="Proposer un article pour le blog"
        description="Proposer un article pour Laravel Cameroun, et partager votre connaissance avec le reste du monde 🤩."
      />
      <Breadcrumb parentLink="/publishing" parentTitle="Publications" title={`${isCreated ? 'Proposer un nouvel article' : post.title}`} />
      <div className="container">
        <div className="pt-10 lg:w-3/4 lg:mx-auto">
          <form onSubmit={store}>
            <div className="grid grid-cols-6 gap-6">
              <div className="col-span-6">
                <TextInput
                  label="Titre"
                  name="title"
                  type="text"
                  errors={errors.title}
                  value={values.title}
                  onChange={handleChange}
                  required
                  placeholder="Nouveautés sur Laravel Cameroun"
                  autoComplete="off"
                />
              </div>
              <div className="col-span-6 md:col-span-2">
                <div className="bg-white px-2 py-1.5 rounded-md shadow overflow-hidden">
                  <p className="text-xs text-gray-400 leading-5 mb-2">Auteur</p>
                  <div className="flex items-center">
                    <div className="min-w-0 flex-shrink-0">
                      <img className="h-10 w-10 rounded-full object-cover" src={user.picture} alt={user.full_name} />
                    </div>
                    <div className="ml-4">
                      <p className="text-gray-700 font-medium text-sm leading-5">{user.full_name}</p>
                      <span className="text-xs text-gray-400">{user.email}</span>
                    </div>
                  </div>
                </div>
              </div>
              <div className="col-span-6 md:col-span-4">
                <SelectInput
                  onChange={handleChange}
                  value={values.category_id}
                  name="category_id"
                  errors={errors.category_id}
                  required
                >
                  {
                    categories.map((category: CategoryType) => (
                      <option key={category.id} value={category.id}>
                        {category.name}
                      </option>
                    ))
                  }
                </SelectInput>
              </div>
              <div className="col-span-6">
                <ReactMde
                  value={body}
                  onChange={setBody}
                  selectedTab={selectedTab}
                  onTabChange={setSelectedTab}
                  commands={listCommands}
                  minEditorHeight={500}
                  generateMarkdownPreview={(markdown) => Promise.resolve(converter.makeHtml(markdown))}
                  textAreaProps={{ required: true, placeholder: "Votre contenu ici..." }}
                />
                <p className="text-xs text-gray-500 font-italic font-light mt-3">
                  * Vous pouvez utiliser du Markdown avec des blocs de code du{" "}
                  <a
                    href="https://help.github.com/en/github/writing-on-github/creating-and-highlighting-code-blocks"
                    target="_blank"
                    rel="noopener noreferrer"
                    className="text-brand-primary"
                  >
                    style de GitHub.
                  </a>
                </p>
              </div>
            </div>
            <div className="mt-8 border-t border-gray-200 pt-5">
              <div className="flex justify-end">
                <span className="ml-3 inline-flex rounded-md shadow-sm">
                  <LoaderButton title={`${isCreated ? 'Soumettre' : 'Modifier'}`} loading={sending} type="submit" />
                </span>
              </div>
            </div>
          </form>
        </div>
      </div>
    </>
  );
};

Propose.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Propose;
