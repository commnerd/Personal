import { TestBed } from '@angular/core/testing';

import { PostService } from './post.service';
import { HttpClientTestingModule, HttpTestingController } from "@angular/common/http/testing";
import { HttpClient } from "@angular/common/http";
import { Post } from "@interfaces/blog/post";
import {TestDataPaginator} from "../../../../testing/TestDataPaginator";

describe('PostService', () => {
  let service: PostService;
  let httpClient: HttpClient;
  let httpTestingController: HttpTestingController;
  const testPosts: Array<Post> = [
    {
      id: 1,
      title: 'Test Post',
      slug: 'test-post',
      body: 'Test Body',
    },
    {
      id: 2,
      title: 'Another Test Post',
      slug: 'another-test-post',
      body: 'Another Test Body',
    }
  ];

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [ HttpClientTestingModule ]
    });

    service = TestBed.inject(PostService);
    // Inject the http service and test controller for each test
    httpClient = TestBed.inject(HttpClient);
    httpTestingController = TestBed.inject(HttpTestingController);
  });

  afterEach(() => {
    // After every test, assert that there are no more pending requests.
    httpTestingController.verify();
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });

  it('should list quotes', () => {
    const paginatedResponse = new TestDataPaginator(testPosts).get();

    service.list().subscribe(data =>
      expect(data).toEqual(paginatedResponse)
    );

    const req = httpTestingController.expectOne('/api/posts?page=1');

    expect(req.request.method).toEqual('GET');

    req.flush(paginatedResponse);
  });

  it('should get a post', () => {
    const response = testPosts[1];

    service.get(2).subscribe(data => expect(data).toEqual(testPosts[1]));

    const req = httpTestingController.expectOne('/api/posts/2');

    expect(req.request.method).toEqual('GET');

    req.flush(testPosts[1]);
  });

  it('should create a post on save', () => {
    const testDrinkPreSave: Post = {
      title: 'A third post',
      slug: 'a-third-post',
      body: 'A third post\'s body',
    };
    const testPostPostSave = {
      id: 3,
      title: 'A third post',
      slug: 'a-third-post',
      body: 'A third post\'s body',
      created_at: 'now',
      edited_at: 'now',
    };

    service.save(testDrinkPreSave)
      .subscribe(data => expect(data).toEqual(testPostPostSave));

    const req = httpTestingController.expectOne('/api/posts');

    expect(req.request.method).toEqual('POST');

    req.flush(testPostPostSave);
  });

  it('should update a quote on save', () => {
    const testPost = {
      id: 3,
      title: 'A third post',
      slug: 'a-third-post',
      body: 'A third post\'s body',
      created_at: 'now',
      edited_at: 'now',
    };

    httpClient.put<Post>('/api/posts/3', testPost)
      .subscribe(data => expect(data).toEqual(testPost));

    const req = httpTestingController.expectOne('/api/posts/3');

    expect(req.request.method).toEqual('PUT');

    req.flush(testPost);
  });
});
