---
title: API Reference

language_tabs:
- bash
- javascript
- php

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://192.168.0.178:8888/docs/collection.json)

<!-- END_INFO -->

#Brand

品牌接口
<!-- START_e6a1447d1827d32e5ba6ac9cdf71dbb4 -->
## index
品牌列表

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/api/admin/brand?condition=%E4%B8%89%E6%98%9F&is_del=neque&current_page=1&per_page=10" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/admin/brand"
);

let params = {
    "condition": "三星",
    "is_del": "neque",
    "current_page": "1",
    "per_page": "10",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/api/admin/brand',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'condition'=> '三星',
            'is_del'=> 'neque',
            'current_page'=> '1',
            'per_page'=> '10',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "品牌查询成功",
    "data": {
        "brand": [
            {
                "id": 23,
                "name": "三星白",
                "logo_id": "1",
                "logo": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                "sort": 88,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-02 11:56:07"
            },
            {
                "id": 24,
                "name": "三星白",
                "logo_id": "1",
                "logo": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                "sort": 88,
                "is_del": 0,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 16:17:47"
            },
            {
                "id": 25,
                "name": "三星白",
                "logo_id": "1",
                "logo": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                "sort": 88,
                "is_del": 0,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 16:18:32"
            },
            {
                "id": 26,
                "name": "三星白",
                "logo_id": "1",
                "logo": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                "sort": 88,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-07 11:09:20"
            },
            {
                "id": 27,
                "name": "三星白",
                "logo_id": "1",
                "logo": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                "sort": 88,
                "is_del": 0,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 16:21:40"
            },
            {
                "id": 28,
                "name": "三星白",
                "logo_id": "1",
                "logo": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                "sort": 88,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 17:49:07"
            },
            {
                "id": 29,
                "name": "三星白",
                "logo_id": "1",
                "logo": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                "sort": 88,
                "is_del": 0,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-06-30 17:38:23"
            },
            {
                "id": 30,
                "name": "三星白",
                "logo_id": "1",
                "logo": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                "sort": 88,
                "is_del": 0,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-06-30 17:38:03"
            },
            {
                "id": 32,
                "name": "三星白",
                "logo_id": "1",
                "logo": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                "sort": 88,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-02 09:56:50"
            },
            {
                "id": 33,
                "name": "三星白",
                "logo_id": "1",
                "logo": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
                "sort": 88,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-02 09:58:51"
            }
        ],
        "meta": {
            "current_page": 1,
            "per_page": "10",
            "total": 22,
            "last_page": 3
        }
    }
}
```

### HTTP Request
`GET api/admin/brand`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `condition` |  optional  | 品牌名称
    `is_del` |  optional  | 是否删除
    `current_page` |  required  | 当前页
    `per_page` |  required  | 每页显示数量

<!-- END_e6a1447d1827d32e5ba6ac9cdf71dbb4 -->

<!-- START_711f7bca136968bf91d0800cb473c3d2 -->
## store
保存品牌

> Example request:

```bash
curl -X POST \
    "http://192.168.0.178:8888/api/admin/brand" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"\u4e09\u661f","logo":1,"sort":100,"is_del":0}'

```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/admin/brand"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "\u4e09\u661f",
    "logo": 1,
    "sort": 100,
    "is_del": 0
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://192.168.0.178:8888/api/admin/brand',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'name' => '三星',
            'logo' => 1,
            'sort' => 100,
            'is_del' => 0,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "品牌创建成功",
    "data": {
        "brand": {
            "id": 51,
            "name": "三星",
            "logo_id": "1",
            "logo": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
            "sort": "100",
            "is_del": "0",
            "created_at": "2020-07-13 17:37:27",
            "updated_at": "2020-07-13 17:37:27"
        }
    }
}
```

### HTTP Request
`POST api/admin/brand`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | 品牌名称
        `logo` | integer |  required  | logo图片ID
        `sort` | integer |  required  | 排序
        `is_del` | integer |  required  | 是否删除[0:正常,1:删除]
    
<!-- END_711f7bca136968bf91d0800cb473c3d2 -->

<!-- START_0572d1a91340566e1a9f53734cfef6d9 -->
## show
查询单一品牌

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/api/admin/brand/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/admin/brand/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/api/admin/brand/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "品牌查询成功",
    "data": {
        "brand": [
            {
                "id": 1,
                "name": "三星",
                "logo_id": "56",
                "logo": "http:\/\/192.168.0.178:8888\/storage\/images\/\/20200701\/8814141d326136b9b651c8ba192b0c51.png",
                "sort": 111,
                "is_del": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-02 15:21:26"
            }
        ]
    }
}
```

### HTTP Request
`GET api/admin/brand/{brand}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `brand` |  required  | 品牌ID

<!-- END_0572d1a91340566e1a9f53734cfef6d9 -->

<!-- START_5abe2cf81b9aecd9045b385b13d73afa -->
## update
更新品牌

> Example request:

```bash
curl -X PUT \
    "http://192.168.0.178:8888/api/admin/brand/51" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"\u4e09\u661f","logo":1,"sort":90,"is_del":0}'

```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/admin/brand/51"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "\u4e09\u661f",
    "logo": 1,
    "sort": 90,
    "is_del": 0
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://192.168.0.178:8888/api/admin/brand/51',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'name' => '三星',
            'logo' => 1,
            'sort' => 90,
            'is_del' => 0,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "品牌更新成功",
    "data": {
        "brand": {
            "id": 51,
            "name": "三星",
            "logo_id": "1",
            "logo": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
            "sort": "90",
            "is_del": "0",
            "created_at": "2020-07-13 17:37:27",
            "updated_at": "2020-07-13 17:37:27"
        }
    }
}
```

### HTTP Request
`PUT api/admin/brand/{brand}`

`PATCH api/admin/brand/{brand}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `brand` |  required  | 品牌ID
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | 品牌名称
        `logo` | integer |  required  | logo图片ID
        `sort` | integer |  required  | 排序
        `is_del` | integer |  required  | 是否删除[0:正常,1:删除]
    
<!-- END_5abe2cf81b9aecd9045b385b13d73afa -->

<!-- START_683bdbae9348bfc894706954ec860e35 -->
## delete
删除品牌

> Example request:

```bash
curl -X DELETE \
    "http://192.168.0.178:8888/api/admin/brand/51" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/admin/brand/51"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://192.168.0.178:8888/api/admin/brand/51',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "品牌删除成功",
    "data": {
        "brand": {
            "id": 51,
            "name": "三星",
            "logo_id": "1",
            "logo": "http:\/\/192.168.0.178:8888\/storage\/images\/20200629\/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
            "sort": "90",
            "is_del": "1",
            "created_at": "2020-07-13 17:37:27",
            "updated_at": "2020-07-13 17:37:27"
        }
    }
}
```

### HTTP Request
`DELETE api/admin/brand/{brand}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `brand` |  required  | 品牌ID

<!-- END_683bdbae9348bfc894706954ec860e35 -->

#general


<!-- START_204613676cab89a55dfdc7d81f16a281 -->
## api/images
> Example request:

```bash
curl -X POST \
    "http://192.168.0.178:8888/api/images" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"images":{"":"sint"}}'

```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/images"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "images": {
        "": "sint"
    }
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://192.168.0.178:8888/api/images',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'images' => [
                '' => 'sint',
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST api/images`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `images[]` | file |  optional  | 图片文件
    
<!-- END_204613676cab89a55dfdc7d81f16a281 -->

<!-- START_701f64236c5cf10f69caffda7e7072f8 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/api/admin/category" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/admin/category"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/api/admin/category',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "获取分类成功",
    "data": {
        "pids": [
            "0",
            "1"
        ],
        "treeCates": [
            {
                "id": 1,
                "pid": 0,
                "name": "|----男装",
                "status": 1,
                "is_more": 1
            },
            {
                "id": 2,
                "pid": 1,
                "name": "|----|----T恤啊啊",
                "status": 2,
                "is_more": 0
            },
            {
                "id": 26,
                "pid": 0,
                "name": "|----1",
                "status": 1,
                "is_more": 0
            },
            {
                "id": 29,
                "pid": 0,
                "name": "|----你好啊",
                "status": 1,
                "is_more": 0
            },
            {
                "id": 30,
                "pid": 0,
                "name": "|----装备",
                "status": 1,
                "is_more": 0
            },
            {
                "id": 31,
                "pid": 0,
                "name": "|----啊啊",
                "status": 1,
                "is_more": 0
            }
        ]
    }
}
```

### HTTP Request
`GET api/admin/category`


<!-- END_701f64236c5cf10f69caffda7e7072f8 -->

<!-- START_a6bb04f86b66b63d8f0e6505d1d29e2b -->
## 获取加前缀的分类
获取商品类型

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/api/admin/category/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/admin/category/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/api/admin/category/create',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "获取分类列表成功",
    "data": {
        "types": [
            {
                "id": 20,
                "name": "啊",
                "sort": 1,
                "created_at": "2020-07-08 11:23:21",
                "updated_at": "2020-07-08 11:23:21"
            },
            {
                "id": 22,
                "name": "啊啊啊啊啊",
                "sort": 1,
                "created_at": "2020-07-08 11:06:34",
                "updated_at": "2020-07-08 11:06:34"
            },
            {
                "id": 23,
                "name": "啊啊",
                "sort": 1,
                "created_at": "2020-07-08 11:09:28",
                "updated_at": "2020-07-08 11:09:28"
            },
            {
                "id": 25,
                "name": "电视剧",
                "sort": 1,
                "created_at": "2020-07-10 15:29:47",
                "updated_at": "2020-07-10 15:29:47"
            },
            {
                "id": 1,
                "name": "手机",
                "sort": 100,
                "created_at": "2020-07-06 16:55:33",
                "updated_at": "2020-07-06 16:55:33"
            },
            {
                "id": 2,
                "name": "手机",
                "sort": 100,
                "created_at": "2020-07-09 14:41:37",
                "updated_at": "2020-07-09 14:41:37"
            },
            {
                "id": 3,
                "name": "通用类型5",
                "sort": 100,
                "created_at": "2020-07-06 16:49:49",
                "updated_at": "2020-07-06 16:49:49"
            },
            {
                "id": 4,
                "name": "通用类型5",
                "sort": 100,
                "created_at": "2020-07-06 16:50:16",
                "updated_at": "2020-07-06 16:50:16"
            },
            {
                "id": 5,
                "name": "通用类型5",
                "sort": 100,
                "created_at": "2020-07-06 16:51:00",
                "updated_at": "2020-07-06 16:51:00"
            },
            {
                "id": 6,
                "name": "通用类型5",
                "sort": 100,
                "created_at": "2020-07-06 16:52:06",
                "updated_at": "2020-07-06 16:52:06"
            },
            {
                "id": 7,
                "name": "通用类型5",
                "sort": 100,
                "created_at": "2020-07-06 16:52:20",
                "updated_at": "2020-07-06 16:52:20"
            },
            {
                "id": 8,
                "name": "通用类型1",
                "sort": 100,
                "created_at": "2020-07-06 17:05:38",
                "updated_at": "2020-07-06 17:05:38"
            },
            {
                "id": 14,
                "name": "手机",
                "sort": 100,
                "created_at": "2020-07-07 09:47:46",
                "updated_at": "2020-07-07 09:47:46"
            },
            {
                "id": 15,
                "name": "手机",
                "sort": 100,
                "created_at": "2020-07-07 09:47:47",
                "updated_at": "2020-07-07 09:47:47"
            },
            {
                "id": 16,
                "name": "手机",
                "sort": 100,
                "created_at": "2020-07-07 09:47:47",
                "updated_at": "2020-07-07 09:47:47"
            },
            {
                "id": 17,
                "name": "手机",
                "sort": 100,
                "created_at": "2020-07-07 09:48:32",
                "updated_at": "2020-07-07 09:48:32"
            },
            {
                "id": 19,
                "name": "手机",
                "sort": 100,
                "created_at": "2020-07-07 10:17:41",
                "updated_at": "2020-07-07 10:17:41"
            },
            {
                "id": 21,
                "name": "啊啊",
                "sort": 123,
                "created_at": "2020-07-08 11:06:04",
                "updated_at": "2020-07-08 11:06:04"
            },
            {
                "id": 18,
                "name": "手机",
                "sort": 210,
                "created_at": "2020-07-07 09:48:42",
                "updated_at": "2020-07-07 09:48:42"
            },
            {
                "id": 13,
                "name": "啊啊",
                "sort": 213,
                "created_at": "2020-07-07 09:47:19",
                "updated_at": "2020-07-07 09:47:19"
            }
        ],
        "cates": [
            {
                "id": 0,
                "name": "顶级分类"
            },
            {
                "id": 1,
                "pid": 0,
                "name": "|----男装",
                "status": 1
            },
            {
                "id": 2,
                "pid": 1,
                "name": "|----|----T恤啊啊",
                "status": 2
            },
            {
                "id": 26,
                "pid": 0,
                "name": "|----1",
                "status": 1
            },
            {
                "id": 29,
                "pid": 0,
                "name": "|----你好啊",
                "status": 1
            },
            {
                "id": 30,
                "pid": 0,
                "name": "|----装备",
                "status": 1
            },
            {
                "id": 31,
                "pid": 0,
                "name": "|----啊啊",
                "status": 1
            }
        ]
    }
}
```

### HTTP Request
`GET api/admin/category/create`


<!-- END_a6bb04f86b66b63d8f0e6505d1d29e2b -->

<!-- START_2f78ffac7816ccf9db5b5c8e130e43da -->
## 保存分类

> Example request:

```bash
curl -X POST \
    "http://192.168.0.178:8888/api/admin/category" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/admin/category"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://192.168.0.178:8888/api/admin/category',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST api/admin/category`


<!-- END_2f78ffac7816ccf9db5b5c8e130e43da -->

<!-- START_214091a9db7d8a91095b4311653a6491 -->
## 查询分类

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/api/admin/category/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/admin/category/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/api/admin/category/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "分类查询成功",
    "data": {
        "cate": [
            {
                "id": 1,
                "pid": 0,
                "name": "男装",
                "goods_type_id": 0,
                "sort": 100,
                "image_id": 0,
                "status": 1,
                "created_at": null,
                "updated_at": "2020-07-08 10:24:50"
            }
        ]
    }
}
```

### HTTP Request
`GET api/admin/category/{category}`


<!-- END_214091a9db7d8a91095b4311653a6491 -->

<!-- START_9323416ad4259365069a9390edd15ed1 -->
## 编辑分类

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/api/admin/category/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/admin/category/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/api/admin/category/1/edit',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "分类查询成功",
    "data": {
        "cate": [
            {
                "id": 1,
                "pid": 0,
                "name": "男装",
                "goods_type_id": 0,
                "sort": 100,
                "image_id": 0,
                "status": 1,
                "created_at": null,
                "updated_at": "2020-07-08 10:24:50"
            }
        ],
        "types": [
            {
                "id": 20,
                "name": "啊",
                "sort": 1,
                "created_at": "2020-07-08 11:23:21",
                "updated_at": "2020-07-08 11:23:21"
            },
            {
                "id": 22,
                "name": "啊啊啊啊啊",
                "sort": 1,
                "created_at": "2020-07-08 11:06:34",
                "updated_at": "2020-07-08 11:06:34"
            },
            {
                "id": 23,
                "name": "啊啊",
                "sort": 1,
                "created_at": "2020-07-08 11:09:28",
                "updated_at": "2020-07-08 11:09:28"
            },
            {
                "id": 25,
                "name": "电视剧",
                "sort": 1,
                "created_at": "2020-07-10 15:29:47",
                "updated_at": "2020-07-10 15:29:47"
            },
            {
                "id": 1,
                "name": "手机",
                "sort": 100,
                "created_at": "2020-07-06 16:55:33",
                "updated_at": "2020-07-06 16:55:33"
            },
            {
                "id": 2,
                "name": "手机",
                "sort": 100,
                "created_at": "2020-07-09 14:41:37",
                "updated_at": "2020-07-09 14:41:37"
            },
            {
                "id": 3,
                "name": "通用类型5",
                "sort": 100,
                "created_at": "2020-07-06 16:49:49",
                "updated_at": "2020-07-06 16:49:49"
            },
            {
                "id": 4,
                "name": "通用类型5",
                "sort": 100,
                "created_at": "2020-07-06 16:50:16",
                "updated_at": "2020-07-06 16:50:16"
            },
            {
                "id": 5,
                "name": "通用类型5",
                "sort": 100,
                "created_at": "2020-07-06 16:51:00",
                "updated_at": "2020-07-06 16:51:00"
            },
            {
                "id": 6,
                "name": "通用类型5",
                "sort": 100,
                "created_at": "2020-07-06 16:52:06",
                "updated_at": "2020-07-06 16:52:06"
            },
            {
                "id": 7,
                "name": "通用类型5",
                "sort": 100,
                "created_at": "2020-07-06 16:52:20",
                "updated_at": "2020-07-06 16:52:20"
            },
            {
                "id": 8,
                "name": "通用类型1",
                "sort": 100,
                "created_at": "2020-07-06 17:05:38",
                "updated_at": "2020-07-06 17:05:38"
            },
            {
                "id": 14,
                "name": "手机",
                "sort": 100,
                "created_at": "2020-07-07 09:47:46",
                "updated_at": "2020-07-07 09:47:46"
            },
            {
                "id": 15,
                "name": "手机",
                "sort": 100,
                "created_at": "2020-07-07 09:47:47",
                "updated_at": "2020-07-07 09:47:47"
            },
            {
                "id": 16,
                "name": "手机",
                "sort": 100,
                "created_at": "2020-07-07 09:47:47",
                "updated_at": "2020-07-07 09:47:47"
            },
            {
                "id": 17,
                "name": "手机",
                "sort": 100,
                "created_at": "2020-07-07 09:48:32",
                "updated_at": "2020-07-07 09:48:32"
            },
            {
                "id": 19,
                "name": "手机",
                "sort": 100,
                "created_at": "2020-07-07 10:17:41",
                "updated_at": "2020-07-07 10:17:41"
            },
            {
                "id": 21,
                "name": "啊啊",
                "sort": 123,
                "created_at": "2020-07-08 11:06:04",
                "updated_at": "2020-07-08 11:06:04"
            },
            {
                "id": 18,
                "name": "手机",
                "sort": 210,
                "created_at": "2020-07-07 09:48:42",
                "updated_at": "2020-07-07 09:48:42"
            },
            {
                "id": 13,
                "name": "啊啊",
                "sort": 213,
                "created_at": "2020-07-07 09:47:19",
                "updated_at": "2020-07-07 09:47:19"
            }
        ],
        "cates": [
            {
                "id": 0,
                "name": "顶级分类"
            },
            {
                "id": 1,
                "pid": 0,
                "name": "|----男装",
                "status": 1
            },
            {
                "id": 2,
                "pid": 1,
                "name": "|----|----T恤啊啊",
                "status": 2
            },
            {
                "id": 26,
                "pid": 0,
                "name": "|----1",
                "status": 1
            },
            {
                "id": 29,
                "pid": 0,
                "name": "|----你好啊",
                "status": 1
            },
            {
                "id": 30,
                "pid": 0,
                "name": "|----装备",
                "status": 1
            },
            {
                "id": 31,
                "pid": 0,
                "name": "|----啊啊",
                "status": 1
            }
        ]
    }
}
```

### HTTP Request
`GET api/admin/category/{category}/edit`


<!-- END_9323416ad4259365069a9390edd15ed1 -->

<!-- START_dde958a883781f63b95acf8f07522b75 -->
## 更新分类

> Example request:

```bash
curl -X PUT \
    "http://192.168.0.178:8888/api/admin/category/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/admin/category/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://192.168.0.178:8888/api/admin/category/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`PUT api/admin/category/{category}`

`PATCH api/admin/category/{category}`


<!-- END_dde958a883781f63b95acf8f07522b75 -->

<!-- START_3bfecade78e62be5edb04afa9f62857b -->
## 删除分类

> Example request:

```bash
curl -X DELETE \
    "http://192.168.0.178:8888/api/admin/category/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/admin/category/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://192.168.0.178:8888/api/admin/category/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`DELETE api/admin/category/{category}`


<!-- END_3bfecade78e62be5edb04afa9f62857b -->

<!-- START_2bf18f2a6d8f9a56e9b7791105ae31dc -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/api/admin/type" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/admin/type"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/api/admin/type',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "types": {
            "current_page": 1,
            "data": [
                {
                    "id": 25,
                    "name": "电视剧",
                    "sort": 1,
                    "created_at": "2020-07-10 15:29:47",
                    "updated_at": "2020-07-10 15:29:47"
                },
                {
                    "id": 23,
                    "name": "啊啊",
                    "sort": 1,
                    "created_at": "2020-07-08 11:09:28",
                    "updated_at": "2020-07-08 11:09:28"
                },
                {
                    "id": 20,
                    "name": "啊",
                    "sort": 1,
                    "created_at": "2020-07-08 11:23:21",
                    "updated_at": "2020-07-08 11:23:21"
                },
                {
                    "id": 22,
                    "name": "啊啊啊啊啊",
                    "sort": 1,
                    "created_at": "2020-07-08 11:06:34",
                    "updated_at": "2020-07-08 11:06:34"
                },
                {
                    "id": 2,
                    "name": "手机",
                    "sort": 100,
                    "created_at": "2020-07-09 14:41:37",
                    "updated_at": "2020-07-09 14:41:37"
                },
                {
                    "id": 3,
                    "name": "通用类型5",
                    "sort": 100,
                    "created_at": "2020-07-06 16:49:49",
                    "updated_at": "2020-07-06 16:49:49"
                },
                {
                    "id": 4,
                    "name": "通用类型5",
                    "sort": 100,
                    "created_at": "2020-07-06 16:50:16",
                    "updated_at": "2020-07-06 16:50:16"
                },
                {
                    "id": 5,
                    "name": "通用类型5",
                    "sort": 100,
                    "created_at": "2020-07-06 16:51:00",
                    "updated_at": "2020-07-06 16:51:00"
                },
                {
                    "id": 6,
                    "name": "通用类型5",
                    "sort": 100,
                    "created_at": "2020-07-06 16:52:06",
                    "updated_at": "2020-07-06 16:52:06"
                },
                {
                    "id": 8,
                    "name": "通用类型1",
                    "sort": 100,
                    "created_at": "2020-07-06 17:05:38",
                    "updated_at": "2020-07-06 17:05:38"
                }
            ],
            "first_page_url": "\/?page=1",
            "from": 1,
            "last_page": 2,
            "last_page_url": "\/?page=2",
            "next_page_url": "\/?page=2",
            "path": "\/",
            "per_page": 10,
            "prev_page_url": null,
            "to": 10,
            "total": 20
        }
    }
}
```

### HTTP Request
`GET api/admin/type`


<!-- END_2bf18f2a6d8f9a56e9b7791105ae31dc -->

<!-- START_84902dbe1ce91e5e42037f62df784d86 -->
## api/admin/type/create
> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/api/admin/type/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/admin/type/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/api/admin/type/create',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "spec": [
            {
                "id": 1,
                "name": "通用",
                "sort": 100,
                "details": "",
                "created_at": "2020-07-06 17:18:24",
                "updated_at": "2020-07-06 17:18:24"
            },
            {
                "id": 3,
                "name": "内存",
                "sort": 10,
                "details": "",
                "created_at": "2020-07-06 16:55:04",
                "updated_at": "2020-07-06 16:55:04"
            },
            {
                "id": 4,
                "name": "内存",
                "sort": 10,
                "details": "",
                "created_at": "2020-07-06 17:16:29",
                "updated_at": "2020-07-06 17:16:29"
            },
            {
                "id": 5,
                "name": "颜色",
                "sort": 10,
                "details": "",
                "created_at": "2020-07-09 14:40:53",
                "updated_at": "2020-07-09 14:40:53"
            },
            {
                "id": 6,
                "name": "啊啊",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:33:57",
                "updated_at": "2020-07-10 11:33:57"
            },
            {
                "id": 7,
                "name": "电脑",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:34:50",
                "updated_at": "2020-07-10 11:34:50"
            },
            {
                "id": 8,
                "name": "啊啊",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:35:38",
                "updated_at": "2020-07-10 11:35:38"
            },
            {
                "id": 9,
                "name": "11",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:35:47",
                "updated_at": "2020-07-10 11:35:47"
            },
            {
                "id": 10,
                "name": "2",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:36:25",
                "updated_at": "2020-07-10 11:36:25"
            },
            {
                "id": 11,
                "name": "啊",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:40:58",
                "updated_at": "2020-07-10 11:40:58"
            },
            {
                "id": 12,
                "name": "啊啊",
                "sort": 11,
                "details": "",
                "created_at": "2020-07-10 11:41:38",
                "updated_at": "2020-07-10 11:41:38"
            },
            {
                "id": 13,
                "name": "啊啊",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 12:01:30",
                "updated_at": "2020-07-10 12:01:30"
            },
            {
                "id": 14,
                "name": "啊实打实大撒",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 16:17:43",
                "updated_at": "2020-07-10 16:17:43"
            },
            {
                "id": 15,
                "name": "手表",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 16:19:24",
                "updated_at": "2020-07-10 16:19:24"
            }
        ]
    }
}
```

### HTTP Request
`GET api/admin/type/create`


<!-- END_84902dbe1ce91e5e42037f62df784d86 -->

<!-- START_adccea5cb8e1ee74d6d49b8340d2fea8 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://192.168.0.178:8888/api/admin/type" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/admin/type"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://192.168.0.178:8888/api/admin/type',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST api/admin/type`


<!-- END_adccea5cb8e1ee74d6d49b8340d2fea8 -->

<!-- START_4939a0f5d3266facf1b6f9edc0dcc558 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/api/admin/type/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/admin/type/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/api/admin/type/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "type": [
            {
                "id": 1,
                "name": "手机",
                "sort": 100,
                "created_at": "2020-07-06 16:55:33",
                "updated_at": "2020-07-06 16:55:33"
            }
        ]
    }
}
```

### HTTP Request
`GET api/admin/type/{type}`


<!-- END_4939a0f5d3266facf1b6f9edc0dcc558 -->

<!-- START_74d0bf9ea2fa3334be174ff0a867e515 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/api/admin/type/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/admin/type/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/api/admin/type/1/edit',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "type": [
            {
                "id": 1,
                "name": "手机",
                "sort": 100,
                "created_at": "2020-07-06 16:55:33",
                "updated_at": "2020-07-06 16:55:33",
                "spec": [
                    {
                        "id": 1,
                        "name": "通用",
                        "sort": 100,
                        "details": "",
                        "created_at": "2020-07-06 17:18:24",
                        "updated_at": "2020-07-06 17:18:24",
                        "pivot": {
                            "type_id": 1,
                            "spec_id": 1
                        }
                    },
                    {
                        "id": 3,
                        "name": "内存",
                        "sort": 10,
                        "details": "",
                        "created_at": "2020-07-06 16:55:04",
                        "updated_at": "2020-07-06 16:55:04",
                        "pivot": {
                            "type_id": 1,
                            "spec_id": 3
                        }
                    }
                ]
            }
        ],
        "spec": [
            {
                "id": 1,
                "name": "通用",
                "sort": 100,
                "details": "",
                "created_at": "2020-07-06 17:18:24",
                "updated_at": "2020-07-06 17:18:24"
            },
            {
                "id": 3,
                "name": "内存",
                "sort": 10,
                "details": "",
                "created_at": "2020-07-06 16:55:04",
                "updated_at": "2020-07-06 16:55:04"
            },
            {
                "id": 4,
                "name": "内存",
                "sort": 10,
                "details": "",
                "created_at": "2020-07-06 17:16:29",
                "updated_at": "2020-07-06 17:16:29"
            },
            {
                "id": 5,
                "name": "颜色",
                "sort": 10,
                "details": "",
                "created_at": "2020-07-09 14:40:53",
                "updated_at": "2020-07-09 14:40:53"
            },
            {
                "id": 6,
                "name": "啊啊",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:33:57",
                "updated_at": "2020-07-10 11:33:57"
            },
            {
                "id": 7,
                "name": "电脑",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:34:50",
                "updated_at": "2020-07-10 11:34:50"
            },
            {
                "id": 8,
                "name": "啊啊",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:35:38",
                "updated_at": "2020-07-10 11:35:38"
            },
            {
                "id": 9,
                "name": "11",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:35:47",
                "updated_at": "2020-07-10 11:35:47"
            },
            {
                "id": 10,
                "name": "2",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:36:25",
                "updated_at": "2020-07-10 11:36:25"
            },
            {
                "id": 11,
                "name": "啊",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:40:58",
                "updated_at": "2020-07-10 11:40:58"
            },
            {
                "id": 12,
                "name": "啊啊",
                "sort": 11,
                "details": "",
                "created_at": "2020-07-10 11:41:38",
                "updated_at": "2020-07-10 11:41:38"
            },
            {
                "id": 13,
                "name": "啊啊",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 12:01:30",
                "updated_at": "2020-07-10 12:01:30"
            },
            {
                "id": 14,
                "name": "啊实打实大撒",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 16:17:43",
                "updated_at": "2020-07-10 16:17:43"
            },
            {
                "id": 15,
                "name": "手表",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 16:19:24",
                "updated_at": "2020-07-10 16:19:24"
            }
        ]
    }
}
```

### HTTP Request
`GET api/admin/type/{type}/edit`


<!-- END_74d0bf9ea2fa3334be174ff0a867e515 -->

<!-- START_ddfc96f5dd2cd99669f0ebf91e638e15 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://192.168.0.178:8888/api/admin/type/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/admin/type/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://192.168.0.178:8888/api/admin/type/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`PUT api/admin/type/{type}`

`PATCH api/admin/type/{type}`


<!-- END_ddfc96f5dd2cd99669f0ebf91e638e15 -->

<!-- START_5fa475b5e166ef0c11ad7356b1ce1373 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://192.168.0.178:8888/api/admin/type/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/admin/type/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://192.168.0.178:8888/api/admin/type/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`DELETE api/admin/type/{type}`


<!-- END_5fa475b5e166ef0c11ad7356b1ce1373 -->

<!-- START_eb57f9f10a51ded148bdcb5669195e94 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/api/admin/spec" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/admin/spec"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/api/admin/spec',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "specs": {
            "current_page": 1,
            "data": [
                {
                    "id": 6,
                    "name": "啊啊",
                    "sort": 1,
                    "details": "",
                    "created_at": "2020-07-10 11:33:57",
                    "updated_at": "2020-07-10 11:33:57",
                    "value": [
                        {
                            "id": 58,
                            "spec_id": 6,
                            "name": "啊1111",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 16:42:59",
                            "updated_at": "2020-07-10 16:42:59"
                        },
                        {
                            "id": 59,
                            "spec_id": 6,
                            "name": "11",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 16:42:59",
                            "updated_at": "2020-07-10 16:42:59"
                        },
                        {
                            "id": 60,
                            "spec_id": 6,
                            "name": "2",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 16:42:59",
                            "updated_at": "2020-07-10 16:42:59"
                        }
                    ]
                },
                {
                    "id": 7,
                    "name": "电脑",
                    "sort": 1,
                    "details": "",
                    "created_at": "2020-07-10 11:34:50",
                    "updated_at": "2020-07-10 11:34:50",
                    "value": [
                        {
                            "id": 47,
                            "spec_id": 7,
                            "name": "笔记本",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 11:59:15",
                            "updated_at": "2020-07-10 11:59:15"
                        }
                    ]
                },
                {
                    "id": 8,
                    "name": "啊啊",
                    "sort": 1,
                    "details": "",
                    "created_at": "2020-07-10 11:35:38",
                    "updated_at": "2020-07-10 11:35:38",
                    "value": [
                        {
                            "id": 50,
                            "spec_id": 8,
                            "name": "啊啊啊啊",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 12:00:53",
                            "updated_at": "2020-07-10 12:00:53"
                        },
                        {
                            "id": 51,
                            "spec_id": 8,
                            "name": "啊11111",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 12:00:53",
                            "updated_at": "2020-07-10 12:00:53"
                        }
                    ]
                },
                {
                    "id": 9,
                    "name": "11",
                    "sort": 1,
                    "details": "",
                    "created_at": "2020-07-10 11:35:47",
                    "updated_at": "2020-07-10 11:35:47",
                    "value": [
                        {
                            "id": 42,
                            "spec_id": 9,
                            "name": "1",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 11:58:35",
                            "updated_at": "2020-07-10 11:58:35"
                        },
                        {
                            "id": 43,
                            "spec_id": 9,
                            "name": "11",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 11:58:35",
                            "updated_at": "2020-07-10 11:58:35"
                        }
                    ]
                },
                {
                    "id": 10,
                    "name": "2",
                    "sort": 1,
                    "details": "",
                    "created_at": "2020-07-10 11:36:25",
                    "updated_at": "2020-07-10 11:36:25",
                    "value": [
                        {
                            "id": 27,
                            "spec_id": 10,
                            "name": "1",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 11:36:25",
                            "updated_at": "2020-07-10 11:36:25"
                        },
                        {
                            "id": 28,
                            "spec_id": 10,
                            "name": "1",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 11:36:25",
                            "updated_at": "2020-07-10 11:36:25"
                        },
                        {
                            "id": 29,
                            "spec_id": 10,
                            "name": "1",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 11:36:25",
                            "updated_at": "2020-07-10 11:36:25"
                        }
                    ]
                },
                {
                    "id": 11,
                    "name": "啊",
                    "sort": 1,
                    "details": "",
                    "created_at": "2020-07-10 11:40:58",
                    "updated_at": "2020-07-10 11:40:58",
                    "value": [
                        {
                            "id": 30,
                            "spec_id": 11,
                            "name": "11",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 11:40:58",
                            "updated_at": "2020-07-10 11:40:58"
                        },
                        {
                            "id": 31,
                            "spec_id": 11,
                            "name": "22",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 11:40:58",
                            "updated_at": "2020-07-10 11:40:58"
                        }
                    ]
                },
                {
                    "id": 13,
                    "name": "啊啊",
                    "sort": 1,
                    "details": "",
                    "created_at": "2020-07-10 12:01:30",
                    "updated_at": "2020-07-10 12:01:30",
                    "value": [
                        {
                            "id": 52,
                            "spec_id": 13,
                            "name": "11",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 12:01:30",
                            "updated_at": "2020-07-10 12:01:30"
                        },
                        {
                            "id": 53,
                            "spec_id": 13,
                            "name": "1",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 12:01:30",
                            "updated_at": "2020-07-10 12:01:30"
                        }
                    ]
                },
                {
                    "id": 14,
                    "name": "啊实打实大撒",
                    "sort": 1,
                    "details": "",
                    "created_at": "2020-07-10 16:17:43",
                    "updated_at": "2020-07-10 16:17:43",
                    "value": [
                        {
                            "id": 54,
                            "spec_id": 14,
                            "name": "啊啊",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 16:17:43",
                            "updated_at": "2020-07-10 16:17:43"
                        },
                        {
                            "id": 55,
                            "spec_id": 14,
                            "name": "啊啊",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 16:17:43",
                            "updated_at": "2020-07-10 16:17:43"
                        }
                    ]
                },
                {
                    "id": 15,
                    "name": "手表",
                    "sort": 1,
                    "details": "",
                    "created_at": "2020-07-10 16:19:24",
                    "updated_at": "2020-07-10 16:19:24",
                    "value": [
                        {
                            "id": 56,
                            "spec_id": 15,
                            "name": "黑",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 16:19:24",
                            "updated_at": "2020-07-10 16:19:24"
                        },
                        {
                            "id": 57,
                            "spec_id": 15,
                            "name": "白",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-10 16:19:24",
                            "updated_at": "2020-07-10 16:19:24"
                        }
                    ]
                },
                {
                    "id": 3,
                    "name": "内存",
                    "sort": 10,
                    "details": "",
                    "created_at": "2020-07-06 16:55:04",
                    "updated_at": "2020-07-06 16:55:04",
                    "value": [
                        {
                            "id": 8,
                            "spec_id": 3,
                            "name": "2G",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-06 16:55:04",
                            "updated_at": "2020-07-06 16:55:04"
                        },
                        {
                            "id": 9,
                            "spec_id": 3,
                            "name": "4G",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-06 16:55:04",
                            "updated_at": "2020-07-06 16:55:04"
                        },
                        {
                            "id": 10,
                            "spec_id": 3,
                            "name": "8G",
                            "sort": 0,
                            "details": "",
                            "created_at": "2020-07-06 16:55:04",
                            "updated_at": "2020-07-06 16:55:04"
                        }
                    ]
                }
            ],
            "first_page_url": "\/?page=1",
            "from": 1,
            "last_page": 2,
            "last_page_url": "\/?page=2",
            "next_page_url": "\/?page=2",
            "path": "\/",
            "per_page": 10,
            "prev_page_url": null,
            "to": 10,
            "total": 14
        }
    }
}
```

### HTTP Request
`GET api/admin/spec`


<!-- END_eb57f9f10a51ded148bdcb5669195e94 -->

<!-- START_1144bc6fdea08d8ddce96397dabd4a3f -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://192.168.0.178:8888/api/admin/spec" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/admin/spec"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://192.168.0.178:8888/api/admin/spec',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST api/admin/spec`


<!-- END_1144bc6fdea08d8ddce96397dabd4a3f -->

<!-- START_40bfefe538bd1e871b0867db2fd349fb -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/api/admin/spec/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/admin/spec/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/api/admin/spec/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "spec": [
            {
                "id": 1,
                "name": "通用",
                "sort": 100,
                "details": "",
                "created_at": "2020-07-06 17:18:24",
                "updated_at": "2020-07-06 17:18:24",
                "value": [
                    {
                        "id": 14,
                        "spec_id": 1,
                        "name": "绿色",
                        "sort": 0,
                        "details": "",
                        "created_at": "2020-07-06 17:18:24",
                        "updated_at": "2020-07-06 17:18:24"
                    }
                ]
            }
        ]
    }
}
```

### HTTP Request
`GET api/admin/spec/{spec}`


<!-- END_40bfefe538bd1e871b0867db2fd349fb -->

<!-- START_bd081498d34d1dc2bf0eca0d7ce5fa04 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://192.168.0.178:8888/api/admin/spec/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/admin/spec/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://192.168.0.178:8888/api/admin/spec/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`PUT api/admin/spec/{spec}`

`PATCH api/admin/spec/{spec}`


<!-- END_bd081498d34d1dc2bf0eca0d7ce5fa04 -->

<!-- START_8f1f153625db53644568ad45fd01a751 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://192.168.0.178:8888/api/admin/spec/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/admin/spec/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://192.168.0.178:8888/api/admin/spec/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`DELETE api/admin/spec/{spec}`


<!-- END_8f1f153625db53644568ad45fd01a751 -->

<!-- START_4f0cf39ed680b5602fa6eba298730581 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/api/admin/goods" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/admin/goods"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/api/admin/goods',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "goods": {
            "current_page": 1,
            "data": [
                {
                    "id": 1,
                    "bn": "G_202007091799",
                    "name": "三星S10",
                    "brief": "",
                    "price": "100.00",
                    "costprice": "0.00",
                    "mktprice": "0.00",
                    "image_id": 1,
                    "pics": "",
                    "goods_category_id": 2,
                    "goods_type_id": 1,
                    "brand_id": 1,
                    "marketable": 1,
                    "stock": 190,
                    "freeze_stock": 40,
                    "weight": "120.00",
                    "unit": "克",
                    "introduction": null,
                    "comments_count": 0,
                    "view_count": 0,
                    "buy_count": 0,
                    "up_at": "2020-07-09 18:22:34",
                    "down_at": null,
                    "sort": 10,
                    "is_recommend": 2,
                    "is_hot": 1,
                    "label_ids": "",
                    "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"8G\"]}",
                    "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                    "created_at": "2020-07-09 18:22:34",
                    "updated_at": "2020-07-09 18:34:50",
                    "is_del": 1,
                    "product": [
                        {
                            "id": 1,
                            "goods_id": 1,
                            "barcode": "",
                            "sku_code": "",
                            "price": "100.00",
                            "costprice": "0.00",
                            "mktprice": "0.00",
                            "marketable": 1,
                            "stock": 50,
                            "freeze_stock": 5,
                            "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
                            "is_default": 1,
                            "image_id": 2,
                            "created_at": "2020-07-09 18:22:34",
                            "updated_at": "2020-07-09 18:22:41",
                            "is_del": 0
                        },
                        {
                            "id": 3,
                            "goods_id": 1,
                            "barcode": "",
                            "sku_code": "",
                            "price": "100.00",
                            "costprice": "0.00",
                            "mktprice": "0.00",
                            "marketable": 1,
                            "stock": 90,
                            "freeze_stock": 18,
                            "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
                            "is_default": 2,
                            "image_id": 4,
                            "created_at": "2020-07-09 18:22:34",
                            "updated_at": "2020-07-09 18:22:41",
                            "is_del": 0
                        },
                        {
                            "id": 5,
                            "goods_id": 1,
                            "barcode": "P__2020070917995",
                            "sku_code": "",
                            "price": "120.00",
                            "costprice": "0.00",
                            "mktprice": "0.00",
                            "marketable": 1,
                            "stock": 10,
                            "freeze_stock": 2,
                            "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"8G\"}]",
                            "is_default": 2,
                            "image_id": 7,
                            "created_at": "2020-07-09 18:22:41",
                            "updated_at": "2020-07-09 18:22:41",
                            "is_del": 0
                        },
                        {
                            "id": 6,
                            "goods_id": 1,
                            "barcode": "P__2020070917996",
                            "sku_code": "",
                            "price": "150.00",
                            "costprice": "0.00",
                            "mktprice": "0.00",
                            "marketable": 1,
                            "stock": 40,
                            "freeze_stock": 15,
                            "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"8G\"}]",
                            "is_default": 2,
                            "image_id": 6,
                            "created_at": "2020-07-09 18:22:41",
                            "updated_at": "2020-07-09 18:22:41",
                            "is_del": 0
                        }
                    ]
                }
            ],
            "first_page_url": "\/?page=1",
            "from": 1,
            "last_page": 1,
            "last_page_url": "\/?page=1",
            "next_page_url": null,
            "path": "\/",
            "per_page": 10,
            "prev_page_url": null,
            "to": 1,
            "total": 1
        }
    }
}
```

### HTTP Request
`GET api/admin/goods`


<!-- END_4f0cf39ed680b5602fa6eba298730581 -->

<!-- START_6b55ae11d145b85c42a4d1a51c3a4e49 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/api/admin/goods/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/admin/goods/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/api/admin/goods/create',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "cates": [
            {
                "id": 1,
                "pid": 0,
                "name": "|----男装",
                "status": 1
            },
            {
                "id": 2,
                "pid": 1,
                "name": "|----|----T恤啊啊",
                "status": 2
            },
            {
                "id": 26,
                "pid": 0,
                "name": "|----1",
                "status": 1
            },
            {
                "id": 29,
                "pid": 0,
                "name": "|----你好啊",
                "status": 1
            },
            {
                "id": 30,
                "pid": 0,
                "name": "|----装备",
                "status": 1
            },
            {
                "id": 31,
                "pid": 0,
                "name": "|----啊啊",
                "status": 1
            }
        ],
        "spec": [
            {
                "id": 1,
                "name": "通用",
                "sort": 100,
                "details": "",
                "created_at": "2020-07-06 17:18:24",
                "updated_at": "2020-07-06 17:18:24"
            },
            {
                "id": 3,
                "name": "内存",
                "sort": 10,
                "details": "",
                "created_at": "2020-07-06 16:55:04",
                "updated_at": "2020-07-06 16:55:04"
            },
            {
                "id": 4,
                "name": "内存",
                "sort": 10,
                "details": "",
                "created_at": "2020-07-06 17:16:29",
                "updated_at": "2020-07-06 17:16:29"
            },
            {
                "id": 5,
                "name": "颜色",
                "sort": 10,
                "details": "",
                "created_at": "2020-07-09 14:40:53",
                "updated_at": "2020-07-09 14:40:53"
            },
            {
                "id": 6,
                "name": "啊啊",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:33:57",
                "updated_at": "2020-07-10 11:33:57"
            },
            {
                "id": 7,
                "name": "电脑",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:34:50",
                "updated_at": "2020-07-10 11:34:50"
            },
            {
                "id": 8,
                "name": "啊啊",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:35:38",
                "updated_at": "2020-07-10 11:35:38"
            },
            {
                "id": 9,
                "name": "11",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:35:47",
                "updated_at": "2020-07-10 11:35:47"
            },
            {
                "id": 10,
                "name": "2",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:36:25",
                "updated_at": "2020-07-10 11:36:25"
            },
            {
                "id": 11,
                "name": "啊",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:40:58",
                "updated_at": "2020-07-10 11:40:58"
            },
            {
                "id": 12,
                "name": "啊啊",
                "sort": 11,
                "details": "",
                "created_at": "2020-07-10 11:41:38",
                "updated_at": "2020-07-10 11:41:38"
            },
            {
                "id": 13,
                "name": "啊啊",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 12:01:30",
                "updated_at": "2020-07-10 12:01:30"
            },
            {
                "id": 14,
                "name": "啊实打实大撒",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 16:17:43",
                "updated_at": "2020-07-10 16:17:43"
            },
            {
                "id": 15,
                "name": "手表",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 16:19:24",
                "updated_at": "2020-07-10 16:19:24"
            }
        ],
        "brand": [
            {
                "id": 1,
                "name": "三星",
                "logo": "56",
                "sort": 111,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-02 15:21:26",
                "is_del": 1
            },
            {
                "id": 2,
                "name": "1",
                "logo": "1",
                "sort": 99,
                "created_at": "2020-06-29 17:34:32",
                "updated_at": "2020-07-01 17:29:12",
                "is_del": 0
            },
            {
                "id": 18,
                "name": "三星白",
                "logo": "1",
                "sort": 108,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 17:29:37",
                "is_del": 0
            },
            {
                "id": 19,
                "name": "三星白",
                "logo": "1",
                "sort": 108,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 17:30:06",
                "is_del": 0
            },
            {
                "id": 20,
                "name": "1",
                "logo": "58",
                "sort": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 17:42:20",
                "is_del": 1
            },
            {
                "id": 21,
                "name": "12",
                "logo": "59",
                "sort": 12,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 17:43:09",
                "is_del": 1
            },
            {
                "id": 22,
                "name": "2",
                "logo": "60",
                "sort": 2,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 17:45:52",
                "is_del": 1
            },
            {
                "id": 23,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-02 11:56:07",
                "is_del": 1
            },
            {
                "id": 24,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 16:17:47",
                "is_del": 0
            },
            {
                "id": 25,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 16:18:32",
                "is_del": 0
            },
            {
                "id": 26,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-07 11:09:20",
                "is_del": 1
            },
            {
                "id": 27,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 16:21:40",
                "is_del": 0
            },
            {
                "id": 28,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 17:49:07",
                "is_del": 1
            },
            {
                "id": 29,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-06-30 17:38:23",
                "is_del": 0
            },
            {
                "id": 30,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-06-30 17:38:03",
                "is_del": 0
            },
            {
                "id": 31,
                "name": "三星白",
                "logo": "1",
                "sort": 88111,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-02 09:55:16",
                "is_del": 0
            },
            {
                "id": 32,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-02 09:56:50",
                "is_del": 1
            },
            {
                "id": 33,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-02 09:58:51",
                "is_del": 1
            },
            {
                "id": 34,
                "name": "1",
                "logo": "1",
                "sort": 88,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-08 10:12:06",
                "is_del": 1
            },
            {
                "id": 35,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-02 11:56:13",
                "is_del": 1
            },
            {
                "id": 36,
                "name": "三星",
                "logo": "1",
                "sort": 100,
                "created_at": "2020-06-30 17:59:15",
                "updated_at": "2020-06-30 17:59:15",
                "is_del": 0
            },
            {
                "id": 37,
                "name": "啊",
                "logo": "1",
                "sort": 101,
                "created_at": "2020-06-30 18:11:16",
                "updated_at": "2020-07-01 16:55:46",
                "is_del": 0
            },
            {
                "id": 38,
                "name": "阿斯顿撒",
                "logo": "50",
                "sort": 123,
                "created_at": "2020-07-01 15:49:58",
                "updated_at": "2020-07-01 16:56:29",
                "is_del": 0
            },
            {
                "id": 39,
                "name": "三星啊",
                "logo": "52",
                "sort": 123,
                "created_at": "2020-07-01 15:51:10",
                "updated_at": "2020-07-01 17:03:39",
                "is_del": 0
            },
            {
                "id": 40,
                "name": "13",
                "logo": "53",
                "sort": 122,
                "created_at": "2020-07-01 15:52:24",
                "updated_at": "2020-07-01 17:25:35",
                "is_del": 0
            },
            {
                "id": 41,
                "name": "三星",
                "logo": "1",
                "sort": 10123,
                "created_at": "2020-07-01 15:53:52",
                "updated_at": "2020-07-01 16:48:43",
                "is_del": 1
            },
            {
                "id": 42,
                "name": "啊实打实大",
                "logo": "1",
                "sort": 123,
                "created_at": "2020-07-01 15:53:53",
                "updated_at": "2020-07-01 16:49:30",
                "is_del": 1
            },
            {
                "id": 43,
                "name": "三星",
                "logo": "1",
                "sort": 1011,
                "created_at": "2020-07-01 15:55:05",
                "updated_at": "2020-07-01 16:46:37",
                "is_del": 0
            },
            {
                "id": 44,
                "name": "123",
                "logo": "1",
                "sort": 123,
                "created_at": "2020-07-01 15:55:40",
                "updated_at": "2020-07-01 16:47:14",
                "is_del": 0
            },
            {
                "id": 45,
                "name": "三星1",
                "logo": "1",
                "sort": 101,
                "created_at": "2020-07-01 16:01:41",
                "updated_at": "2020-07-02 18:35:05",
                "is_del": 1
            },
            {
                "id": 46,
                "name": "三星",
                "logo": "1",
                "sort": 111,
                "created_at": "2020-07-01 16:06:20",
                "updated_at": "2020-07-01 16:45:27",
                "is_del": 0
            },
            {
                "id": 47,
                "name": "啊",
                "logo": "86",
                "sort": 1,
                "created_at": "2020-07-07 10:58:24",
                "updated_at": "2020-07-10 15:28:27",
                "is_del": 1
            },
            {
                "id": 48,
                "name": "1",
                "logo": "87",
                "sort": 1,
                "created_at": "2020-07-07 10:59:51",
                "updated_at": "2020-07-08 10:11:42",
                "is_del": 1
            },
            {
                "id": 49,
                "name": "1",
                "logo": "88",
                "sort": 1,
                "created_at": "2020-07-07 11:01:10",
                "updated_at": "2020-07-07 11:09:26",
                "is_del": 1
            },
            {
                "id": 50,
                "name": "已",
                "logo": "89",
                "sort": 1,
                "created_at": "2020-07-08 10:42:13",
                "updated_at": "2020-07-08 10:42:15",
                "is_del": 1
            },
            {
                "id": 51,
                "name": "三星",
                "logo": "1",
                "sort": 100,
                "created_at": "2020-07-13 17:37:27",
                "updated_at": "2020-07-13 17:37:27",
                "is_del": 0
            }
        ]
    }
}
```

### HTTP Request
`GET api/admin/goods/create`


<!-- END_6b55ae11d145b85c42a4d1a51c3a4e49 -->

<!-- START_b4c911978d3b1363c6d8368c7e9d256f -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://192.168.0.178:8888/api/admin/goods" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/admin/goods"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://192.168.0.178:8888/api/admin/goods',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST api/admin/goods`


<!-- END_b4c911978d3b1363c6d8368c7e9d256f -->

<!-- START_95cb295a66887bc87d231647cf934875 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/api/admin/goods/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/admin/goods/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/api/admin/goods/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "goods": [
            {
                "id": 1,
                "bn": "G_202007091799",
                "name": "三星S10",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "image_id": 1,
                "pics": "",
                "goods_category_id": 2,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": 190,
                "freeze_stock": 40,
                "weight": "120.00",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": "2020-07-09 18:22:34",
                "down_at": null,
                "sort": 10,
                "is_recommend": 2,
                "is_hot": 1,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"8G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "created_at": "2020-07-09 18:22:34",
                "updated_at": "2020-07-09 18:34:50",
                "is_del": 1,
                "product": [
                    {
                        "id": 1,
                        "goods_id": 1,
                        "barcode": "",
                        "sku_code": "",
                        "price": "100.00",
                        "costprice": "0.00",
                        "mktprice": "0.00",
                        "marketable": 1,
                        "stock": 50,
                        "freeze_stock": 5,
                        "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
                        "is_default": 1,
                        "image_id": 2,
                        "created_at": "2020-07-09 18:22:34",
                        "updated_at": "2020-07-09 18:22:41",
                        "is_del": 0
                    },
                    {
                        "id": 3,
                        "goods_id": 1,
                        "barcode": "",
                        "sku_code": "",
                        "price": "100.00",
                        "costprice": "0.00",
                        "mktprice": "0.00",
                        "marketable": 1,
                        "stock": 90,
                        "freeze_stock": 18,
                        "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
                        "is_default": 2,
                        "image_id": 4,
                        "created_at": "2020-07-09 18:22:34",
                        "updated_at": "2020-07-09 18:22:41",
                        "is_del": 0
                    },
                    {
                        "id": 5,
                        "goods_id": 1,
                        "barcode": "P__2020070917995",
                        "sku_code": "",
                        "price": "120.00",
                        "costprice": "0.00",
                        "mktprice": "0.00",
                        "marketable": 1,
                        "stock": 10,
                        "freeze_stock": 2,
                        "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"8G\"}]",
                        "is_default": 2,
                        "image_id": 7,
                        "created_at": "2020-07-09 18:22:41",
                        "updated_at": "2020-07-09 18:22:41",
                        "is_del": 0
                    },
                    {
                        "id": 6,
                        "goods_id": 1,
                        "barcode": "P__2020070917996",
                        "sku_code": "",
                        "price": "150.00",
                        "costprice": "0.00",
                        "mktprice": "0.00",
                        "marketable": 1,
                        "stock": 40,
                        "freeze_stock": 15,
                        "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"8G\"}]",
                        "is_default": 2,
                        "image_id": 6,
                        "created_at": "2020-07-09 18:22:41",
                        "updated_at": "2020-07-09 18:22:41",
                        "is_del": 0
                    }
                ]
            }
        ]
    }
}
```

### HTTP Request
`GET api/admin/goods/{good}`


<!-- END_95cb295a66887bc87d231647cf934875 -->

<!-- START_260f82804c7e0295307e499bd681175e -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.178:8888/api/admin/goods/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/admin/goods/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://192.168.0.178:8888/api/admin/goods/1/edit',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 1,
    "message": "查询成功",
    "data": {
        "cates": [
            {
                "id": 1,
                "pid": 0,
                "name": "|----男装",
                "status": 1
            },
            {
                "id": 2,
                "pid": 1,
                "name": "|----|----T恤啊啊",
                "status": 2
            },
            {
                "id": 26,
                "pid": 0,
                "name": "|----1",
                "status": 1
            },
            {
                "id": 29,
                "pid": 0,
                "name": "|----你好啊",
                "status": 1
            },
            {
                "id": 30,
                "pid": 0,
                "name": "|----装备",
                "status": 1
            },
            {
                "id": 31,
                "pid": 0,
                "name": "|----啊啊",
                "status": 1
            }
        ],
        "spec": [
            {
                "id": 1,
                "name": "通用",
                "sort": 100,
                "details": "",
                "created_at": "2020-07-06 17:18:24",
                "updated_at": "2020-07-06 17:18:24"
            },
            {
                "id": 3,
                "name": "内存",
                "sort": 10,
                "details": "",
                "created_at": "2020-07-06 16:55:04",
                "updated_at": "2020-07-06 16:55:04"
            },
            {
                "id": 4,
                "name": "内存",
                "sort": 10,
                "details": "",
                "created_at": "2020-07-06 17:16:29",
                "updated_at": "2020-07-06 17:16:29"
            },
            {
                "id": 5,
                "name": "颜色",
                "sort": 10,
                "details": "",
                "created_at": "2020-07-09 14:40:53",
                "updated_at": "2020-07-09 14:40:53"
            },
            {
                "id": 6,
                "name": "啊啊",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:33:57",
                "updated_at": "2020-07-10 11:33:57"
            },
            {
                "id": 7,
                "name": "电脑",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:34:50",
                "updated_at": "2020-07-10 11:34:50"
            },
            {
                "id": 8,
                "name": "啊啊",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:35:38",
                "updated_at": "2020-07-10 11:35:38"
            },
            {
                "id": 9,
                "name": "11",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:35:47",
                "updated_at": "2020-07-10 11:35:47"
            },
            {
                "id": 10,
                "name": "2",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:36:25",
                "updated_at": "2020-07-10 11:36:25"
            },
            {
                "id": 11,
                "name": "啊",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 11:40:58",
                "updated_at": "2020-07-10 11:40:58"
            },
            {
                "id": 12,
                "name": "啊啊",
                "sort": 11,
                "details": "",
                "created_at": "2020-07-10 11:41:38",
                "updated_at": "2020-07-10 11:41:38"
            },
            {
                "id": 13,
                "name": "啊啊",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 12:01:30",
                "updated_at": "2020-07-10 12:01:30"
            },
            {
                "id": 14,
                "name": "啊实打实大撒",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 16:17:43",
                "updated_at": "2020-07-10 16:17:43"
            },
            {
                "id": 15,
                "name": "手表",
                "sort": 1,
                "details": "",
                "created_at": "2020-07-10 16:19:24",
                "updated_at": "2020-07-10 16:19:24"
            }
        ],
        "brand": [
            {
                "id": 1,
                "name": "三星",
                "logo": "56",
                "sort": 111,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-02 15:21:26",
                "is_del": 1
            },
            {
                "id": 2,
                "name": "1",
                "logo": "1",
                "sort": 99,
                "created_at": "2020-06-29 17:34:32",
                "updated_at": "2020-07-01 17:29:12",
                "is_del": 0
            },
            {
                "id": 18,
                "name": "三星白",
                "logo": "1",
                "sort": 108,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 17:29:37",
                "is_del": 0
            },
            {
                "id": 19,
                "name": "三星白",
                "logo": "1",
                "sort": 108,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 17:30:06",
                "is_del": 0
            },
            {
                "id": 20,
                "name": "1",
                "logo": "58",
                "sort": 1,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 17:42:20",
                "is_del": 1
            },
            {
                "id": 21,
                "name": "12",
                "logo": "59",
                "sort": 12,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 17:43:09",
                "is_del": 1
            },
            {
                "id": 22,
                "name": "2",
                "logo": "60",
                "sort": 2,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 17:45:52",
                "is_del": 1
            },
            {
                "id": 23,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-02 11:56:07",
                "is_del": 1
            },
            {
                "id": 24,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 16:17:47",
                "is_del": 0
            },
            {
                "id": 25,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 16:18:32",
                "is_del": 0
            },
            {
                "id": 26,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-07 11:09:20",
                "is_del": 1
            },
            {
                "id": 27,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 16:21:40",
                "is_del": 0
            },
            {
                "id": 28,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-01 17:49:07",
                "is_del": 1
            },
            {
                "id": 29,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-06-30 17:38:23",
                "is_del": 0
            },
            {
                "id": 30,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-06-30 17:38:03",
                "is_del": 0
            },
            {
                "id": 31,
                "name": "三星白",
                "logo": "1",
                "sort": 88111,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-02 09:55:16",
                "is_del": 0
            },
            {
                "id": 32,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-02 09:56:50",
                "is_del": 1
            },
            {
                "id": 33,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-02 09:58:51",
                "is_del": 1
            },
            {
                "id": 34,
                "name": "1",
                "logo": "1",
                "sort": 88,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-08 10:12:06",
                "is_del": 1
            },
            {
                "id": 35,
                "name": "三星白",
                "logo": "1",
                "sort": 88,
                "created_at": "2020-06-29 14:31:19",
                "updated_at": "2020-07-02 11:56:13",
                "is_del": 1
            },
            {
                "id": 36,
                "name": "三星",
                "logo": "1",
                "sort": 100,
                "created_at": "2020-06-30 17:59:15",
                "updated_at": "2020-06-30 17:59:15",
                "is_del": 0
            },
            {
                "id": 37,
                "name": "啊",
                "logo": "1",
                "sort": 101,
                "created_at": "2020-06-30 18:11:16",
                "updated_at": "2020-07-01 16:55:46",
                "is_del": 0
            },
            {
                "id": 38,
                "name": "阿斯顿撒",
                "logo": "50",
                "sort": 123,
                "created_at": "2020-07-01 15:49:58",
                "updated_at": "2020-07-01 16:56:29",
                "is_del": 0
            },
            {
                "id": 39,
                "name": "三星啊",
                "logo": "52",
                "sort": 123,
                "created_at": "2020-07-01 15:51:10",
                "updated_at": "2020-07-01 17:03:39",
                "is_del": 0
            },
            {
                "id": 40,
                "name": "13",
                "logo": "53",
                "sort": 122,
                "created_at": "2020-07-01 15:52:24",
                "updated_at": "2020-07-01 17:25:35",
                "is_del": 0
            },
            {
                "id": 41,
                "name": "三星",
                "logo": "1",
                "sort": 10123,
                "created_at": "2020-07-01 15:53:52",
                "updated_at": "2020-07-01 16:48:43",
                "is_del": 1
            },
            {
                "id": 42,
                "name": "啊实打实大",
                "logo": "1",
                "sort": 123,
                "created_at": "2020-07-01 15:53:53",
                "updated_at": "2020-07-01 16:49:30",
                "is_del": 1
            },
            {
                "id": 43,
                "name": "三星",
                "logo": "1",
                "sort": 1011,
                "created_at": "2020-07-01 15:55:05",
                "updated_at": "2020-07-01 16:46:37",
                "is_del": 0
            },
            {
                "id": 44,
                "name": "123",
                "logo": "1",
                "sort": 123,
                "created_at": "2020-07-01 15:55:40",
                "updated_at": "2020-07-01 16:47:14",
                "is_del": 0
            },
            {
                "id": 45,
                "name": "三星1",
                "logo": "1",
                "sort": 101,
                "created_at": "2020-07-01 16:01:41",
                "updated_at": "2020-07-02 18:35:05",
                "is_del": 1
            },
            {
                "id": 46,
                "name": "三星",
                "logo": "1",
                "sort": 111,
                "created_at": "2020-07-01 16:06:20",
                "updated_at": "2020-07-01 16:45:27",
                "is_del": 0
            },
            {
                "id": 47,
                "name": "啊",
                "logo": "86",
                "sort": 1,
                "created_at": "2020-07-07 10:58:24",
                "updated_at": "2020-07-10 15:28:27",
                "is_del": 1
            },
            {
                "id": 48,
                "name": "1",
                "logo": "87",
                "sort": 1,
                "created_at": "2020-07-07 10:59:51",
                "updated_at": "2020-07-08 10:11:42",
                "is_del": 1
            },
            {
                "id": 49,
                "name": "1",
                "logo": "88",
                "sort": 1,
                "created_at": "2020-07-07 11:01:10",
                "updated_at": "2020-07-07 11:09:26",
                "is_del": 1
            },
            {
                "id": 50,
                "name": "已",
                "logo": "89",
                "sort": 1,
                "created_at": "2020-07-08 10:42:13",
                "updated_at": "2020-07-08 10:42:15",
                "is_del": 1
            },
            {
                "id": 51,
                "name": "三星",
                "logo": "1",
                "sort": 100,
                "created_at": "2020-07-13 17:37:27",
                "updated_at": "2020-07-13 17:37:27",
                "is_del": 0
            }
        ],
        "goods": [
            {
                "id": 1,
                "bn": "G_202007091799",
                "name": "三星S10",
                "brief": "",
                "price": "100.00",
                "costprice": "0.00",
                "mktprice": "0.00",
                "image_id": 1,
                "pics": "",
                "goods_category_id": 2,
                "goods_type_id": 1,
                "brand_id": 1,
                "marketable": 1,
                "stock": 190,
                "freeze_stock": 40,
                "weight": "120.00",
                "unit": "克",
                "introduction": null,
                "comments_count": 0,
                "view_count": 0,
                "buy_count": 0,
                "up_at": "2020-07-09 18:22:34",
                "down_at": null,
                "sort": 10,
                "is_recommend": 2,
                "is_hot": 1,
                "label_ids": "",
                "spec_list": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"8G\"]}",
                "spec_desc": "{\"key\":\"颜色\",\"value\":[\"黑色\",\"白色\",\"金色\"]},{\"key\":\"内存\",\"value\":[\"2G\",\"4G\",\"8G]\"}",
                "created_at": "2020-07-09 18:22:34",
                "updated_at": "2020-07-09 18:34:50",
                "is_del": 1,
                "product": [
                    {
                        "id": 1,
                        "goods_id": 1,
                        "barcode": "",
                        "sku_code": "",
                        "price": "100.00",
                        "costprice": "0.00",
                        "mktprice": "0.00",
                        "marketable": 1,
                        "stock": 50,
                        "freeze_stock": 5,
                        "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
                        "is_default": 1,
                        "image_id": 2,
                        "created_at": "2020-07-09 18:22:34",
                        "updated_at": "2020-07-09 18:22:41",
                        "is_del": 0
                    },
                    {
                        "id": 3,
                        "goods_id": 1,
                        "barcode": "",
                        "sku_code": "",
                        "price": "100.00",
                        "costprice": "0.00",
                        "mktprice": "0.00",
                        "marketable": 1,
                        "stock": 90,
                        "freeze_stock": 18,
                        "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"2G\"}]",
                        "is_default": 2,
                        "image_id": 4,
                        "created_at": "2020-07-09 18:22:34",
                        "updated_at": "2020-07-09 18:22:41",
                        "is_del": 0
                    },
                    {
                        "id": 5,
                        "goods_id": 1,
                        "barcode": "P__2020070917995",
                        "sku_code": "",
                        "price": "120.00",
                        "costprice": "0.00",
                        "mktprice": "0.00",
                        "marketable": 1,
                        "stock": 10,
                        "freeze_stock": 2,
                        "spec_params": "[{\"key\":\"颜色\",\"value\":\"黑色\"},{\"key\":\"内存\",\"value\":\"8G\"}]",
                        "is_default": 2,
                        "image_id": 7,
                        "created_at": "2020-07-09 18:22:41",
                        "updated_at": "2020-07-09 18:22:41",
                        "is_del": 0
                    },
                    {
                        "id": 6,
                        "goods_id": 1,
                        "barcode": "P__2020070917996",
                        "sku_code": "",
                        "price": "150.00",
                        "costprice": "0.00",
                        "mktprice": "0.00",
                        "marketable": 1,
                        "stock": 40,
                        "freeze_stock": 15,
                        "spec_params": "[{\"key\":\"颜色\",\"value\":\"白色\"},{\"key\":\"内存\",\"value\":\"8G\"}]",
                        "is_default": 2,
                        "image_id": 6,
                        "created_at": "2020-07-09 18:22:41",
                        "updated_at": "2020-07-09 18:22:41",
                        "is_del": 0
                    }
                ]
            }
        ]
    }
}
```

### HTTP Request
`GET api/admin/goods/{good}/edit`


<!-- END_260f82804c7e0295307e499bd681175e -->

<!-- START_d4da2edf1bc2e1db7c31164ef418936b -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://192.168.0.178:8888/api/admin/goods/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/admin/goods/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://192.168.0.178:8888/api/admin/goods/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`PUT api/admin/goods/{good}`

`PATCH api/admin/goods/{good}`


<!-- END_d4da2edf1bc2e1db7c31164ef418936b -->

<!-- START_3f4639ac2921209061f1d8ac93d977c0 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://192.168.0.178:8888/api/admin/goods/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/admin/goods/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://192.168.0.178:8888/api/admin/goods/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`DELETE api/admin/goods/{good}`


<!-- END_3f4639ac2921209061f1d8ac93d977c0 -->

<!-- START_1ab85a9a2627f7c9660a365bcc570698 -->
## 更改状态

> Example request:

```bash
curl -X PATCH \
    "http://192.168.0.178:8888/api/admin/category/status/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.178:8888/api/admin/category/status/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PATCH",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->patch(
    'http://192.168.0.178:8888/api/admin/category/status/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`PATCH api/admin/category/status/{category}`


<!-- END_1ab85a9a2627f7c9660a365bcc570698 -->


