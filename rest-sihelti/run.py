import pymysql
from app import app
from flask import jsonify
from flask import flash, request


# import NLP
from Sastrawi.Stemmer.StemmerFactory import StemmerFactory
from Sastrawi.StopWordRemover.StopWordRemoverFactory import StopWordRemoverFactory
from gensim.models import Word2Vec, WordEmbeddingSimilarityIndex
from gensim.similarities import SoftCosineSimilarity, SparseTermSimilarityMatrix
from gensim.corpora import Dictionary
from sklearn.metrics.pairwise import cosine_similarity
from collections import Counter
import math
import numpy as np
import re
import json
        

# code NLP
model = Word2Vec.load("idwiki_word2vec_200.model")




dataset = []
with open('output.json') as json_file:
    dataset = json.load(json_file)




sw_remover = StopWordRemoverFactory().create_stop_word_remover()
stemmer = StemmerFactory().create_stemmer()




def preprocess(document):
    document = sw_remover.remove(document)
    document_stem = stemmer.stem(document).split(" ")
    document_token = [w for w in document_stem if w.isalpha()]
    return document_token





def predict_decease(input_document, docsim_index, dictionary):
    query = preprocess(input_document)
    sims = docsim_index[dictionary.doc2bow(query)]
    predict_result = sims[0]
    
    data = dataset[predict_result[0]]
    weight = predict_result[1]
    
    result_dict = {'data' : data, 'weight': weight}
                   
    return result_dict





def docs_similarity(sentences1, sentences2, model):
    sims = []
    
    for (sent1, sent2) in zip(sentences1, sentences2):
    
        sent1_without_sw = sw_remover.remove(sent1)
        tokens1 = stemmer.stem(sent1_without_sw).split(" ")
        
        sent2_without_sw = sw_remover.remove(sent2)
        tokens2 = stemmer.stem(sent2_without_sw).split(" ")
        
        tokens1 = [token for token in tokens1 if token in model.wv]
        tokens2 = [token for token in tokens2 if token in model.wv]
        print(tokens1)
        print(tokens2)
        print("------")
        if len(tokens1) == 0 or len(tokens2) == 0:
            sims.append(0)
            continue
        
        tokfreqs1 = Counter(tokens1)
        tokfreqs2 = Counter(tokens2)
        
        weights1 = [tokfreqs1[token] / model.wv[token] for token in tokfreqs1]
        weights2 = [tokfreqs2[token] / model.wv[token] for token in tokfreqs2]
                
        embedding1 = np.average([model.wv[token] for token in tokfreqs1], axis=0, weights=weights1).reshape(1, -1)
        embedding2 = np.average([model.wv[token] for token in tokfreqs2], axis=0, weights=weights2).reshape(1, -1)

        sim = cosine_similarity(embedding1, embedding2)[0][0]
        sims.append(sim)
        
    return sims





# Create Term Similarity Index from Word2Vec model

termsim_index = WordEmbeddingSimilarityIndex(model.wv)

# Create Corpus List
corpus_list = []
for data in dataset:
    docs = ""
    for sentence in data['gejala']:
        docs += " " + sentence
    corpus_list.append(docs)

# Create token list for all document corpus
corpus_list_token = [preprocess(doc) for doc in corpus_list]

dictionary = Dictionary(corpus_list_token)
bow_corpus = [dictionary.doc2bow(document) for document in corpus_list_token]

# Create Term similarity matrix
similarity_matrix = SparseTermSimilarityMatrix(termsim_index, dictionary)

# Compute Soft Cosine Similarity
docsim_index = SoftCosineSimilarity(bow_corpus, similarity_matrix, num_best=10)


@app.route('/diagnosa', methods=['POST'])
def add_user():
    if (request.method == "POST"):
        forminput = request.form
        text = forminput["input_diagnosa"] 
        predict = predict_decease(text, docsim_index, dictionary)
        resp = jsonify(predict,forminput)
        resp.status_code = 200
        return resp
    else:
        return not_found()


        
@app.errorhandler(404)
def not_found(error=None):
    message = {
        'status': 404,
        'message': 'Not Found: ' + request.url,
    }
    resp = jsonify(message)
    resp.status_code = 404

    return resp
        
if __name__ == "__main__":
    app.run(host="0.0.0.0",debug=True)
            
          