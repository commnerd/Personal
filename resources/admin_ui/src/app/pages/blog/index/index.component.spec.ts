import { ComponentFixture, TestBed } from '@angular/core/testing';

import { IndexComponent } from './index.component';
import { of } from "rxjs";
import { TestDataPaginator } from "../../../../testing/TestDataPaginator";
import { MatDialog, MatDialogRef } from "@angular/material/dialog";
import { RouterTestingModule } from "@angular/router/testing";
import { ActivatedRoute } from "@angular/router";
import { PostService } from "@services/models/blog/post.service";
import { BlogModule } from "@pages/blog/blog.module";
import { HttpClient, HttpHandler } from "@angular/common/http";

describe('IndexComponent', () => {
  let component: IndexComponent;
  let fixture: ComponentFixture<IndexComponent>;
  let dialog: MatDialog;
  let postService: PostService;
  let activatedRoute: ActivatedRoute;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [BlogModule, RouterTestingModule],
      providers: [PostService, HttpClient, HttpHandler],
      declarations: [IndexComponent]
    });
    fixture = TestBed.createComponent(IndexComponent);
    component = fixture.componentInstance;
    postService = TestBed.inject(PostService);
    dialog = TestBed.inject(MatDialog);
    activatedRoute = TestBed.inject(ActivatedRoute);
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });

  it('should print "No posts found." on empty paged response', () => {
    postService.list = () => of((new TestDataPaginator([])).get());
    fixture = TestBed.createComponent(IndexComponent);
    fixture.detectChanges();
    expect(fixture.nativeElement.querySelector('table').textContent).toEqual("No posts found.");
  });

  it('should print the blog post information as passed in', () => {
    let data = [{
      id: 1,
      title: "A post",
      slug: "a-post",
      body: "Some awesome text",
    }, {
      id: 2,
      title: "Another post",
      slug: "another-post",
      body: "More awesome text",
    }];
    postService.list = () => of((new TestDataPaginator(data)).get());
    fixture = TestBed.createComponent(IndexComponent);
    fixture.detectChanges();
    let content = fixture.nativeElement.querySelector('table').textContent;
    expect(content).toContain("A post");
    expect(content).toContain("a-post");
    expect(content).toContain("Another post");
    expect(content).toContain("another-post");
  });

  it('delete a blog post on confirmation', () => {
    let data = [{
      id: 1,
      title: "A post",
      slug: "a-post",
      body: "Some awesome text",
    }];
    postService.list = () => of((new TestDataPaginator(data)).get());
    const postServiceSpy = spyOn(postService, 'delete');
    fixture = TestBed.createComponent(IndexComponent);
    fixture.detectChanges();

    let content = fixture.nativeElement.querySelector('table').textContent;
    let deleteButton = fixture.nativeElement.querySelector('button.delete');
    expect(content).toContain("A post");
    expect(content).toContain("a-post");

    spyOn(dialog, 'open').and.returnValue({
      afterClosed: () => of(true)
    } as unknown as MatDialogRef<any>);
    deleteButton.click();
    expect(postServiceSpy).toHaveBeenCalledTimes(1);
  });

  it('avoid deleting a blog post on negating confirmation', () => {
    let data = [{
      id: 1,
      title: "A post",
      slug: "a-post",
      body: "Some awesome text",
    }];
    postService.list = () => of((new TestDataPaginator(data)).get());
    const postServiceSpy = spyOn(postService, 'delete');
    fixture = TestBed.createComponent(IndexComponent);
    fixture.detectChanges();

    let content = fixture.nativeElement.querySelector('table').textContent;
    let deleteButton = fixture.nativeElement.querySelector('button.delete');
    expect(content).toContain("A post");

    spyOn(dialog, 'open').and.returnValue({
      afterClosed: () => of(false)
    } as unknown as MatDialogRef<any>);
    deleteButton.click();
    expect(postServiceSpy).toHaveBeenCalledTimes(0);
  });

  it('should default to pulling first page', () => {
    activatedRoute.queryParams = of({});
    const postServiceSpy = spyOn(postService, 'list');
    fixture = TestBed.createComponent(IndexComponent);
    fixture.detectChanges();
    expect(postServiceSpy).toHaveBeenCalledOnceWith(1);
  });

  it('should pull page corresponding to passed page param', () => {
    activatedRoute.queryParams = of({page: 2});
    const postServiceSpy = spyOn(postService, 'list');
    fixture = TestBed.createComponent(IndexComponent);
    fixture.detectChanges();
    expect(postServiceSpy).toHaveBeenCalledOnceWith(2);
  });
});
