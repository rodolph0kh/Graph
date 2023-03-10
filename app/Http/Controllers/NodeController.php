<?php

namespace App\Http\Controllers;

use App\Http\Requests\HandleStoreNodeRequest;
use App\Models\Node;
use App\Models\Relationship;
use Illuminate\Http\Request;

class NodeController extends Controller
{
    public function retreiveAllNodes()
    {
        return Node::all();
    }

    public function retreiveNode(Request $request)
    {
        $node = Node::where('name', $request->name)->first();

        return $node ?? response()->json(['error' => 'Node not found'], 400);
    }

    public function store(HandleStoreNodeRequest $handleStoreNodeRequest)
    {
        return Node::create([
            'type' => $handleStoreNodeRequest->get('type'),
            'name' => $handleStoreNodeRequest->get('name'),
            'properties' => json_encode($handleStoreNodeRequest->get('properties'))
        ]);
    }

    public function getNodeRelationshipsByType(Request $request)
    {
        $node = Node::where('name', $request->name)->first();
        $relationships = Relationship::where('type', $request->relationshipType)->where($request->direction, $node->id)->get();
        $direction = $request->direction == 'source' ? 'destination' : 'source';
        $nodes = collect();
        foreach($relationships as $relationship) {
            $nodes->push(Node::where('id', $relationship[$direction])->first());
        }
        return $nodes;
    }
}
